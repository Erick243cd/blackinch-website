<?php

namespace App\Controllers;


class Services extends BaseController
{
    public function index()
    {
        $data = [
            'user_data' => session()->get('user_data'),
            'title' => "Services | " . altData(),
            'services' => $this->serviceModel->asObject()->where('is_deleted', '0')->findAll()
        ];
        return view('posts/admin/list', $data);
    }


    public function create()
    {
        $user = session()->get('user_data');
        $data = [
            'title' => "Nouvelle Activité",
            'validation' => null
        ];
        if ($this->request->getMethod() == 'post') {
            $this->validation->setRules([
                'title' => [
                    'label' => 'Post', 'rules' => 'required',
                    'errors' => ['required' => 'Le titre est requis'],
                ],
                'description' => [
                    'label' => 'Description', 'rules' => 'required',
                    'errors' => ['required' => 'La description est requise'],
                ],
                'picture' => [
                    'label' => 'Picture',
                    'rules' => 'uploaded[picture]|is_image[picture]|max_size[picture,5096]',
                    'errors' => [
                        'uploaded' => 'Ne doit pas être vide',
                        'is_image' => 'Le format de cet image est inconnu',
                        'max_size' => 'Ne doit pas dépasser 5 Mo de taille',
                    ]
                ]
            ]);
            if ($this->validation->withRequest($this->request)->run()) {

                $file = $this->request->getFile('picture');

                if ($file->isValid() && !$file->hasMoved()) {
                    $imageName = $file->getRandomName();

                    $data = array(
                        'title' => $this->request->getVar('title'),
                        'category_id' => $this->request->getVar('category_id'),
                        'slug' => strtolower(convert_accented_characters(url_title($this->request->getVar('title')))),
                        'description' => $this->request->getVar('description'),
                        'postImage' => $imageName,
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d'),
                    );

                    $this->postModel->save($data);

                    $file->move('./public/assets/img/posts', $imageName);

                    session()->setFlashData("success", "Ajouté avec succès");
                    return redirect()->to('/list-posts');
                }
            } else {
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
                'categories' => $this->categoryModel->asObject()->findAll()
            ];

            if ($this->request->getMethod() == 'post') {
                $this->validation->setRules([
                    'title' => [
                        'label' => 'Titre', 'rules' => 'required',
                        'errors' => ['required' => 'Le titre est requis'],
                    ], 'category_id' => [
                        'label' => 'Catégorie', 'rules' => 'required',
                        'errors' => ['required' => 'La catégorie est requise'],
                    ],
                    'description' => [
                        'label' => 'Description', 'rules' => 'required',
                        'errors' => ['required' => 'La description est requise'],
                    ],
                ]);
                if ($this->validation->withRequest($this->request)->run()) {
                    $data = array(
                        'title' => $this->request->getVar('title'),
                        'category_id' => $this->request->getVar('category_id'),
                        'slug' => strtolower(convert_accented_characters(url_title($this->request->getVar('title')))),
                        'description' => $this->request->getVar('description'),
                        'updated_at' => date('Y-m-d'),
                    );


                    $this->postModel->update($id, $data);

                    session()->setFlashData("success", "Ajouté avec succès");
                    return redirect()->to('/list-posts');
                } else {
                    $data['validation'] = $this->validation->getErrors();
                }
            }
            echo view('posts/admin/edit', $data);
        } else {
            session()->setFlashData("error", "Aucune information trouvée pour la requête envoyée");
            return redirect()->to('/list-posts');
        }
    }

    function addImage($id)
    {
        $post = $this->postModel->asObject()->where('postId', $id)->first();

        if (!empty($post)) {

            $data = [
                'title' => "Modifier l'image de l'activité",
                'validation' => null,
                'post' => $post
            ];
            if ($this->request->getMethod() == 'post') {
                $rules = [
                    'picture' => [
                        'label' => 'Image',
                        'rules' => 'uploaded[picture]|is_image[picture]|max_size[picture,5096]',
                        'errors' => [
                            'uploaded' => 'Ne doit pas être vide',
                            'is_image' => 'Le format de cet image est inconnu',
                            'max_size' => 'Ne doit pas dépasser 5 Mo de taille',
                        ]
                    ]
                ];
                if ($this->validate($rules)) {
                    $file = $this->request->getFile('picture');

                    if ($file->isValid() && !$file->hasMoved()) {
                        $imageName = $file->getRandomName();

                        $data = ['postImage' => $imageName];

                        $this->postModel->update($id, $data);

                        $file->move('./public/assets/img/posts', $imageName);
                        session()->setFlashData("success", "Mise à jour effectué avec succès !");
                        return redirect()->to('/list-posts');
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
        $post = $this->postModel->where('postId', $id)->first();

        if (!empty($post)) {
            $data = ['is_deleted' => '1'];

            $this->postModel->update($id, $data);
            session()->setFlashData("success", "Suppression succès");
            return redirect()->to('/list-posts');
        }
    }


    public function detail($slug)
    {
        $service = $this->serviceModel->asObject()->where('slug', $slug)->first();

        if (!empty($service)) {
            $data = [
                'title' => $service->name,
                'page' => 'services',
                'service' => $service,
                'services' => $this->serviceModel->asObject()
                    ->where(['slug !=' => $slug])
                    ->orderBy('serviceId', 'DESC')->findAll(3),
                'carousel' => $this->carouselModel->asObject()->where('service_id', $service->serviceId)->findAll(),
                'sys_data' => $this->coordonneeModel->asObject()->first(),
                'user_data' => session()->get('user_data')
            ];

            return view('pages/service_detail', $data);
        } else {
            return view('errors/error_404');
        }
    }

    //Add view number


    public function serviceList()
    {
        $data = [
            'title' => "Actualités | " . altData(),
            'subtitle' => altData(),
            'services' => $this->serviceModel->asObject()
                ->where(['is_deleted' => '0'])
                ->orderBy('serviceId', 'DESC')->findAll(),
            'page' => 'services',
            'sys_data' => $this->coordonneeModel->asObject()->first(),
            'user_data' => session()->get('user_data')
        ];
        echo view('pages/services', $data);
    }


    public function search()
    {
        $request = htmlspecialchars($this->request->getVar('search'));

        if ($request != null) {
            $data = [
                'title' => "Nos services | " . altData(),
                'request' => $request,
                'page' => 'services',
                'services' => $this->serviceModel->asObject()
                    ->like('name', $request)->orLike('description', $request)
                    ->orderBy('serviceId', 'DESC')->findAll(),
                'sys_data' => $this->coordonneeModel->asObject()->first(),
                'user_data' => session()->get('user_data')
            ];
            echo view('pages/services', $data);
        }
    }
}
