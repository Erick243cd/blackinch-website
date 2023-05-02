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
            'posts' => $this->postModel->asObject()->where('is_deleted', 'N')->findAll()
        ];
        return view('posts/admin/list', $data);
    }

    public function posts()
    {
        $data = [
            'page' => 'activities',
            'title' => 'Activités récentes | ' . altData(),
            'contacts' => $this->coordModel->asObject()->first(),
            'user_data' => session()->get('user_data'),
            'posts' => $this->postModel->asObject()->where('is_deleted', 'N')->orderBy('postId', 'DESC')->findAll()
        ];
        return view('posts/index', $data);
    }


    public function create()
    {
        $user = session()->get('user_data');
        $data = [
            'title' => "Nouvelle Activité",
            'validation' => null,
        ];
        if ($this->request->getMethod() == 'post') {
            $this->validation->setRules([
                'title' => [
                    'label' => 'Projet', 'rules' => 'required',
                    'errors' => ['required' => 'Le titre est réquis'],
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
                        'slug' => strtolower(convert_accented_characters(url_title($this->request->getVar('title')))),
                        'description' => $this->request->getVar('description'),
                        'picture' => $imageName,
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d'),
                    );

                    $this->postModel->save($data);

                    $file->move('./public/assets/es_admin/images/posts', $imageName);

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
        $post = $this->postModel->asObject()->where('postId', $id)->first();
        if (!empty($post)) {

            $data = [
                'title' => "Modifier l'activité",
                'validation' => null,
                'post' => $post
            ];

            if ($this->request->getMethod() == 'post') {
                $this->validation->setRules([
                    'title' => [
                        'label' => 'Projet', 'rules' => 'required',
                        'errors' => ['required' => 'Le titre est réquis'],
                    ],
                    'description' => [
                        'label' => 'Description', 'rules' => 'required',
                        'errors' => ['required' => 'La description est requise'],
                    ],
                ]);
                if ($this->validation->withRequest($this->request)->run()) {
                    $data = array(
                        'title' => $this->request->getVar('title'),
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

                        $data = ['picture' => $imageName];

                        $this->postModel->update($id, $data);

                        $file->move('./public/assets/es_admin/images/posts', $imageName);
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

    public function detail($slug)
    {
        $post = $this->postModel->asObject()->where('slug', $slug)->first();
        if (!empty($post)) {
            $data = [
                'page' => 'detail-activity',
                'title' => $post->title . ' | ' . altData(),
                'post' => $post,
                'posts' => $this->postModel->asObject()->where('slug!=', $slug)->findAll(3),
                'contacts' => $this->coordModel->asObject()->first(),
                'user_data' => session()->get('user_data')
            ];
            return view('posts/post_detail', $data);
        } else {
            $data['msg'] = "Aucune information n'a été trouvé pour la requête envoyée !";
            return view('errors/error_404', $data);
        }
    }

    function delete($id)
    {
        $data = [
            'project' => $this->projectModel->getProject($id),
        ];
        if (!empty($data)) {
            $this->projectModel->where('proj_id', $id)->delete();
            $session = session();
            $session->setFlashData("success", "Projet supprimé avec succès");
            return redirect()->to('/project-list');
        }
    }

    public function search()
    {
        $keyword = htmlentities($this->request->getVar('key'));

        $data = [
            'page' => 'activities',
            'title' => 'Activités récentes | ' . altData(),
            'requests' => "Résultats pour <b class='text-success'>{$keyword}</b>",
            'contacts' => $this->coordModel->asObject()->first(),
            'user_data' => session()->get('user_data'),
            'posts' => $this->postModel->asObject()
                ->like('title', $keyword)
                ->orLike('description', $keyword)
                ->where('is_deleted', 'N')
                ->orderBy('postId', 'DESC')->findAll()
        ];
        return view('posts/index', $data);
    }

}
