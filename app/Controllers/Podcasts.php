<?php

namespace App\Controllers;

class Podcasts extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Page d'accueil",
            'page' => 'podcasts',
            'subtitle' => 'Radio Communautaire du Lualaba RCL',

            'podcasts' => $this->podcastModel->asObject()
                ->join('categories', 'podcasts.category_id=categories.categoryId')
                ->where('is_deleted', '0')
                ->orderBy('podcastId', 'DESC')->findAll(50),

            'news' => $this->postModel->asObject()
                ->join('categories', 'posts.category_id=categories.categoryId')
                ->orderBy('postId', 'DESC')
                ->where(['is_featured' => '', 'is_deleted' => '0'])->findAll(3),

            'mostview' => $this->postModel->asObject()
                ->join('categories', 'posts.category_id=categories.categoryId')
                ->orderBy('postId', 'DESC')
                ->where('viewNumber >', '0')
                ->findAll(5),
            'user_data' => session()->get('user_data')
        ];

        echo view('podcasts/index', $data);
    }

    public function list()
    {
        $data = [
            'title' => altData() . '| Emissions',
            'podcasts' => $this->podcastModel->asObject()
                ->where('is_deleted', '0')
                ->join('categories', 'categories.categoryId=podcasts.category_id')
                ->orderBy('podcastId', 'DESC')
                ->findAll()
        ];
        echo view('podcasts/admin/list', $data);
    }

    public function create()
    {
        $user = session()->get('user_data');

        $data = [
            'title' => "Nouvelle Emission",
            'categories' => $this->categoryModel->asObject()->findAll(),
            'validation' => null,
        ];
        if ($this->request->getMethod() == 'post') {
            $this->validation->setRules([
                'title' => [
                    'label' => 'Titre de l\'emission', 'rules' => 'required',
                    'errors' => ['required' => 'Le titre est requis'],
                ],
                'category_id' => [
                    'label' => 'Catégorie de l\'emission', 'rules' => 'required',
                    'errors' => ['required' => 'La catégorie est requis'],
                ],
                'audio_file' => [
                    'label' => 'Picture',
                    'rules' => 'uploaded[audio_file]|max_size[audio_file,50096]',
                    'errors' => [
                        'uploaded' => 'Ne doit pas être vide',
                        'max_size' => 'Ne doit pas dépasser 50 Mo de taille',
                    ]
                ]
            ]);
            if ($this->validation->withRequest($this->request)->run()) {

                $file = $this->request->getFile('audio_file');

                if ($file->isValid() && !$file->hasMoved()) {
                    $audioName = $file->getRandomName();

                    $data = array(
                        'title' => $this->request->getVar('title'),
                        'slug' => strtolower(convert_accented_characters(url_title($this->request->getVar('title')))),
                        'audioFile' => $audioName,
                        'category_id' => $this->request->getVar('category_id'),
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d'),
                    );

                    $this->podcastModel->save($data);

                    $file->move('./public/assets/podcasts', $audioName);

                    session()->setFlashData("success", "Ajouté avec succès");
                    return redirect()->to('/list-podcasts');
                }
            } else {
                $data['validation'] = $this->validation->getErrors();
            }
        }
        echo view('podcasts/admin/create', $data);
    }

    public function edit($id)
    {
        $podcast = $this->podcastModel->asObject()
            ->join('categories', 'categories.categoryId=podcasts.category_id')
            ->where('podcastId', $id)->first();

        if (!empty($podcast)) {
            $data = [
                'title' => "Modifier l'Emission",
                'validation' => null,
                'podcast' => $podcast,
                'categories'=>$this->categoryModel->asObject()->findAll()
            ];

            if ($this->request->getMethod() == 'post') {
                $this->validation->setRules([
                    'title' => [
                        'label' => 'Titre', 'rules' => 'required',
                        'errors' => ['required' => 'Le titre est réquis'],
                    ],
                    'category_id' => [
                        'label' => 'Catégorie de l\'emission', 'rules' => 'required',
                        'errors' => ['required' => 'La catégorie est requis'],
                    ]
                ]);
                if ($this->validation->withRequest($this->request)->run()) {
                    $data = array(
                        'title' => $this->request->getVar('title'),
                        'slug' => strtolower(convert_accented_characters(url_title($this->request->getVar('title')))),
                        'category_id' => $this->request->getVar('category_id'),
                        'updated_at' => date('Y-m-d'),
                    );
                    $this->podcastModel->update($id, $data);

                    session()->setFlashData("success", "Modifications effectuées avec succès");
                    return redirect()->to('/list-podcasts');
                } else {
                    $data['validation'] = $this->validation->getErrors();
                }
            }
            echo view('podcasts/admin/edit', $data);
        } else {
            session()->setFlashData("error", "Aucune information trouvée pour la requête envoyée");
            return redirect()->to('/list-podcasts');
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
        $podcast = $this->podcastModel->where('podcastId', $id)->first();

        if (!empty($podcast)) {
            $data = ['is_deleted' => '1'];
            $this->podcastModel->update($id, $data);
            session()->setFlashData("success", "Suppression effectuée avec succès");
            return redirect()->to('/list-podcasts');
        }
    }

}
