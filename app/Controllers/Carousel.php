<?php

namespace App\Controllers;

class Carousel extends BaseController
{

    public function __construct()
    {
    }

    public function index()
    {

    }

    public function list()
    {
        $data = [
            'title' => 'Gallérie Carousel',
            'user_data' => session()->get('user_data'),
            'carousel' => $this->carModel
                ->join('services', 'services.srv_id=carousel.product_id')
                ->findAll(),
        ];
        return view('carousel/admin/list', $data);
    }

    public function create()
    {
        $user = session()->get('user_data');
        $data = [
            'title' => "Ajout Image Carousel",
            'validation' => null,
            'products' => $this->serviceModel->asObject()->orderBy('name')->findAll()
        ];
        if ($this->request->getMethod() == 'post') {
            $this->validation->setRules([

                'productId' => [
                    'label' => 'Produit', 'rules' => 'required',
                    'errors' => ['required' => 'Le produit est requis'],
                ]
            ]);
            if ($this->validation->withRequest($this->request)->run()) {

                $productId = $this->request->getVar('productId');
                if ($imagefile = $this->request->getFiles()) {

                    foreach ($imagefile['pictures'] as $file) {
                        if ($file->isValid() && !$file->hasMoved()) {

                            $imageName = $file->getRandomName();
                            $file->move('./assets/es_admin/images/carousel', $imageName);

                            $data = array(
                                'product_id' => $productId,
                                'pictures' => $imageName,
                                'created_at' => date('Y-m-d'),
                            );

                            $this->carModel->save($data);
                        }
                    }
                    $session = session();
                    $session->setFlashData("success", "Ajouté avec succès");
                    return redirect()->to('carousel-list');
                }
            } else {
                $data['validation'] = $this->validation->getErrors();
            }
        }
        return view('carousel/admin/create', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Modifier',
            'carousel' => $this->carModel->getCarousel($id),
        ];
        return view('carousel/admin/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getVar('car_id');

        $data = array(
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
        );
        if (!empty($data)) {
            $this->carModel->update($id, $data);
            $session = session();
            $session->setFlashData("success", "Modifié avec succès !");
            return redirect()->to('/carousel-list');
        } else {
            echo view('carousel/admin/edit/' . $id);
        }

    }


    function addImage($key)
    {
        $data[] = null;
        $data = [
            'carousel' => $this->carModel->getCarousel($key)
        ];
        if (!empty($data['carousel'])) {
            echo view('carousel/admin/image', $data);
        } else {
            return redirect()->back();
        }
    }

    function saveImage()
    {
        $data[] = null;
        $id = $this->request->getVar('car_id');
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'car_id' => [
                    'label' => 'Carousel ID',
                    'rules' => 'required'],
                'picture' => [
                    'label' => 'Image',
                    'rules' => 'uploaded[picture]|is_image[picture]',
                    'errors' => [
                        'uploaded' => 'Ne doit pas être vide',
                        'is_image' => 'Le format de cet image est inconnu',
                    ]
                ]
            ];
            if ($this->validate($rules)) {

                $file = $this->request->getFile('picture');

                if ($file->isValid() && !$file->hasMoved()) {
                    $imageName = $file->getRandomName();
                    $data = ['pictures' => $imageName];

                    $this->carModel->update($id, $data);
                    $file->move('./assets/es_admin/images/carousel', $imageName);
                    return redirect()->to('/carousel-list');
                }
            } else {
                $data['validation'] = $this->validation->getErrors();
            }
        }
        echo view('carousel/admin/image', $data);

    }


    function delete($id)
    {
        $data = [
            'carousel' => $this->carModel->getCarousel($id)
        ];
        if (!empty($data)) {
            $this->carModel->where('car_id', $id)->delete();
            $session = session();
            $session->setFlashData("success", "Image supprimé avec succès");
            return redirect()->to('/carousel-list');
        }
    }
}
