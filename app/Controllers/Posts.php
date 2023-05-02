<?php

namespace App\Controllers;

use org\bovigo\vfs\vfsStreamContainerIterator;

class Posts extends BaseController
{

    public function index()
    {      
        $data = [
            'user_data' => session()->get('user_data'),
            'title' => altData(),
            'posts' => $this->postModel->asObject()
                ->join('categories', 'categories.categoryId=posts.category_id')
                ->where('is_deleted', '0')->findAll()
        ];
        return view('posts/admin/list', $data);
        return view('posts/admin/list', $data);
    }

    public function posts()
    {
        $data = [
            'page' => 'activities',
            'user_data' => session()->get('user_data'),
            'title' => 'Activités récentes | ' . altData(),
            'contacts' => $this->coordonneeModel->asObject()->first(),
            'posts' => $this->postModel->asObject()
                ->join('categories', 'categories.categoryId=posts.category_id')
                ->where('is_deleted', '0')->findAll()
        ];
        return view('posts/admin/list', $data);
    }


    public function create()
    {
        $user = session()->get('user_data');
        $data = [
            'title' => "Nouvelle Activité",
            'validation' => null,
            'categories' => $this->categoryModel->asObject()->findAll()
        ];
        // Get Validation rules from the model
        $rules = $this->postModel->getValidationRules();
        if ($this->request->getMethod() == 'post') {
            $this->validation->setRules($rules);
            if ($this->validation->withRequest($this->request)->run()) {

                $file = $this->request->getFile('picture');

                if ($file->isValid() && !$file->hasMoved()) {
                    $imageName = $file->getRandomName();

                    $data = array(
                        'title' => $this->request->getVar('title'),
                        'slug' => strtolower(convert_accented_characters(url_title($this->request->getVar('title')))),
                        'description' => $this->request->getVar('description'),
                        'category_id' => $this->request->getVar('category_id'),
                        'postImage' => $imageName,
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d'),
                    );
                    $this->postModel->save($data);

                    $file->move('./public/assets/es_admin/images/posts', $imageName);
                    return redirect()->to('/list-posts')->with("success", "Ajouté avec succès");
                }
            } else {
                // die('Fuck yourself');
                $data['validation'] = $this->validation->getErrors();
            }
        }
        echo view('posts/admin/create', $data);
    }

    public function edit($id)
    {
        $post = $this->postModel->asObject()
            ->join('categories', 'categories.categoryId=posts.category_id')
            ->where('postId', $id)->first();

        if (!empty($post)) {
            $data = [
                'title' => "Modifier le post",
                'validation' => null,
                'post' => $post,
                'categories'=>$this->categoryModel->asObject()->findAll()
            ];

            if ($this->request->getMethod() == 'post') {
                $this->validation->setRules(
                    // Validation Rules from the UserModel 
                    $this->postModel->getValidationRules(['except' => ['postImage']])
                );
                if ($this->validation->withRequest($this->request)->run()) {
                    $data = array(
                        'title' => $this->request->getVar('title'),
                        'category_id' => $this->request->getVar('category_id'),
                        'slug' => strtolower(convert_accented_characters(url_title($this->request->getVar('title')))),
                        'description' => $this->request->getVar('description'),
                        'updated_at' => date('Y-m-d'),
                    );

                    $this->postModel->update($id, $data);
                   
                    return redirect()->to('/list-posts')->with("success", "Modifié avec succès");
                } else {
                    $data['validation'] = $this->validation->getErrors();
                }
            }
            echo view('posts/admin/edit', $data);
        } else {            
            return redirect()->to('/list-posts')->with("error", "Aucune information trouvée pour la requête envoyée");
        }
    }

    function addImage($id)
    {
        $post = $this->postModel->asObject()->find($id);

        if (!empty($post)) {

            $data = [
                'title' => "Modifier l'image de l'activité",
                'validation' => null,
                'post' => $post
            ];
            $oldImage = $post->postImage;
            $path = './public/assets/img/posts';

            if ($this->request->getMethod() == 'post') {

                $rules = // Validation Rules from the UserModel 
                $this->postModel->getValidationRules(['only' => ['postImage']]);

                if ($this->validate($rules)) {
                    $file = $this->request->getFile('picture');

                    if ($file->isValid() && !$file->hasMoved()) {
                        $imageName = $file->getRandomName();

                        $data = ['postImage' => $imageName];

                        //Delete the old image if it does exists
                        if(file_exists($path .'/'. $oldImage) && $oldImage !== null){
                            unlink($path .'/'. $oldImage);
                        }

                        $this->postModel->update($id, $data);

                        $file->move($path, $imageName);

                        return redirect()->to('/list-posts')->with("success", "Mise-à-jour effectué avec succès !");
                    }
                } else {
                    $data['validation'] = $this->validation->getErrors();
                }
            }
            echo view('posts/admin/image', $data);

        } else {
            return redirect()->back();
        }
    }

    function delete($id)
    {
        $post = $this->postModel->asObject()->find($id);

        if (!empty($post)) {
            $data = ['is_deleted' => '1'];

            $this->postModel->update($id, $data);
            return redirect()->to('/list-posts')->with("success", "Suppression succès");
        }
    }

    public function removeAsFeatured($id)
    {
        $post = $this->postModel->asObject()->find($id);

        if (!empty($post)) {
            $data = ['is_featured' => '0'];

            $this->postModel->update($id, $data);
            return redirect()->to('/list-posts')->with("success", "Opération effectuée");
        }
    }

    public function makeAsFeatured($id)
    {
        $post = $this->postModel->asObject()->find($id);

        if (!empty($post)) {
            $data = ['is_featured' => '1'];
            $this->postModel->update($id, $data);
            return redirect()->to('/list-posts')->with("success", "Opération effectuée");
        }
    }
    public function makeAsMostFormat($id)
    {
        $post = $this->postModel->asObject()->find($id);

        if (!empty($post)) {
            $data = ['is_most_format' => '1'];
            $this->postModel->update($id, $data);
            return redirect()->to('/list-posts')->with("success", "Opération effectuée");
        }

    }
    public function removeAsMostFormat($id)
    {
        $post = $this->postModel->asObject()->find($id);

        if (!empty($post)) {
            $data = ['is_most_format' => '0'];
            $this->postModel->update($id, $data);
            return redirect()->to('/list-posts')->with("success", "Opération effectuée");
        }
    }

    public function detail($slug)
    {
        $new = $this->postModel->asObject()->where('slug', $slug)->first();
        if (!empty($new)) {
            //Update post view number
            $this->postView($new->postId);

            $data = [
                'title' => $new->title,
                'page' => 'post-details',
                'new' => $new,
                'news' => $this->postModel->asObject()
                    ->where(['slug !=' => $slug])
                    ->orderBy('postId', 'DESC')->findAll(3),
                'most_reads' => $this->postModel->asObject()
                    ->join('categories', 'posts.category_id=categories.categoryId')
                    ->orderBy('viewNumber', 'DESC')
                    ->where(['is_deleted' => '0'])->findAll(4),
                'categories' => $this->postModel->postNumberByCategory(),
                'user_data' => session()->get('user_data')
            ];
            return view('posts/detail', $data);
        } else {
            return view('errors/error_404');
        }
    }

    //Add view number
    function postView($postId)
    {
        $post = $this->postModel->asObject()->where('postId', $postId)->first();
        $data = ['viewNumber' => $post->viewNumber + 1];
        $this->postModel->update($postId, $data);
    }


    public function news()
    {
        $data = [
            'title' => "Actualités || RCL",
            'subtitle' => 'Radio Communautaire du Lualaba RCL',
            'posts' => $this->postModel->asObject()
                ->join('categories', 'posts.category_id=categories.categoryId')
                ->where(['is_deleted' => '0'])
                ->orderBy('postId', 'DESC')->findAll(),

            'page' => 'news',

            'news' => $this->postModel->asObject()
                ->join('categories', 'posts.category_id=categories.categoryId')
                ->orderBy('postId', 'DESC')
                ->where(['is_featured' => '', 'is_deleted' => '0'])->findAll(),

            'podcasts' => $this->podcastModel->asObject()
                ->join('categories', 'podcasts.category_id=categories.categoryId')
                ->where('is_deleted', 0)
                ->orderBy('podcastId', 'DESC')->findAll(5),

            'one_post_by_category' => $this->postModel->onePostByCategory(),
            'categories' => $this->postModel->postNumberByCategory(),
            'user_data' => session()->get('user_data')
        ];
        echo view('posts/news', $data);
    }

    public function postByCategory($categorySlug)
    {
        $category = $this->categoryModel->asObject()->where('category_slug', $categorySlug)->first();

        if (!empty($category)) {
            $data = [
                'title' => "Actualités | {$category->name}",
                'page' => 'news-by-category',
                'subtitle' => 'Radio Communautaire du Lualaba RCL',
                'posts' => $this->postModel->asObject()
                    ->join('categories', 'posts.category_id=categories.categoryId')
                    ->where(['is_deleted' => '0', 'category_id' => $category->categoryId])->findAll(),
                'news' => $this->postModel->asObject()
                    ->join('categories', 'posts.category_id=categories.categoryId')
                    ->orderBy('postId', 'DESC')
                    ->where(['is_featured' => '', 'is_deleted' => '0'])->findAll(3),
                'user_data' => session()->get('user_data')
            ];
            echo view('posts/post-by-category', $data);

        } else {
            echo view('errors/404');
        }
    }

    public function search()
    {
        $request = htmlspecialchars($this->request->getVar('search'));

        if ($request != null) {
            $data = [
                'title' => "Résultat de <b style='color: rgba(155,64,250,0.82); font-style: italic; text-transform: lowercase'> $request</b>",
                'page' => 'search',
                'posts' => $this->postModel->asObject()
                    ->join('categories', 'posts.category_id=categories.categoryId')
                    ->like('title', $request)->orLike('description', $request)->orLike('name', $request)
                    ->orderBy('postId', 'DESC')->findAll(),
                'user_data' => session()->get('user_data')
            ];
            echo view('posts/search', $data);
        }
    }

}
