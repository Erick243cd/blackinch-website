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
        return view('services/admin/list', $data);
    }

    public function create()
    {
        $user = session()->get('user_data');
        $data = [
            'title' => "Nouvelle Activité",
            'validation' => null
        ];

        if ($this->request->getMethod() === 'post') {
            $this->validation->setRules(
                $this->serviceModel->getValidationRules()
            );
            if ($this->validation->withRequest($this->request)->run()) {

                $file = $this->request->getFile('picture');

                if ($file->isValid() && !$file->hasMoved()) {
                    $imageName = $file->getRandomName();

                    $data = array(
                        'name' => $this->request->getVar('name'),
                        'slug' => strtolower(convert_accented_characters(url_title($this->request->getVar('name')))),
                        'description' => $this->request->getVar('description'),
                        'picture' => $imageName,
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d'),
                    );

                    $this->serviceModel->save($data);

                    $file->move('./public/assets/es_admin/images/services', $imageName);

                    return redirect()->to('/list-services')->with("success", "Ajouté avec succès");
                }
            } else {
                $data['validation'] = $this->validation->getErrors();
            }
        }
        echo view('services/admin/create', $data);
    }

    public function edit($id)
    {        
        $service = $this->serviceModel->asObject()->find($id);

        if (!empty($service)) {
            $data = [
                'title' => "Modifier le service",
                'validation' => null,
                'service' => $service,
            ];
            $rules = $this->serviceModel->getValidationRules(['except' => ['picture']]);
            if ($this->request->getMethod() == 'post') {
                $this->validation->setRules($rules);
                if ($this->validation->withRequest($this->request)->run()) {
                    $data = array(
                        'name' => $this->request->getVar('name'),
                        'slug' => strtolower(convert_accented_characters(url_title($this->request->getVar('name')))),
                        'description' => $this->request->getVar('description'),
                        'updated_at' => date('Y-m-d'),
                    );

                    $this->serviceModel->update($id, $data);

                    return redirect()->to('/list-services')->with("success", "Modifié avec succès");
                } else {
                    $data['validation'] = $this->validation->getErrors();
                }
            }
            echo view('services/admin/edit', $data);
        } else {
            return redirect()->to('/list-posts')->with("error", "Aucune information trouvée pour la requête envoyée");
        }
    }

    function addImage($id)
    {
        $post = $this->postModel->asObject()->where('postId', $id)->first();

        if (!empty($post)) {

            $data = [
                'title' => "Modifier l'image du service",
                'validation' => null,
                'post' => $post
            ];
            if ($this->request->getMethod() == 'post') {
                $rules = $this->serviceModel->getValidationRules(['only' => ['picture']]);
                if ($this->validate($rules)) {
                    $file = $this->request->getFile('picture');

                    if ($file->isValid() && !$file->hasMoved()) {
                        $imageName = $file->getRandomName();

                        $data = ['picture' => $imageName];

                        $this->postModel->update($id, $data);

                        $file->move('./public/assets/es_admin/images/services', $imageName);
                        return redirect()->to('/list-posts')->with("success", "Mise à jour effectué avec succès !");
                    }
                } else {
                    $data['validation'] = $this->validation->getErrors();
                }
            }
            echo view('services/admin/image', $data);

        } else {
            return redirect()->back();
        }
    }

    function delete($id)
    {
        $service = $this->serviceModel->asObject()->find($id);

        if (!empty($service)) {
            $data = ['is_deleted' => '1'];
            $this->postModel->update($id, $data);
            return redirect()->to('/list-posts')->with("success", "Suppression succès");
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
            'title' => "Services | " . altData(),
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
