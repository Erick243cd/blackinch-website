<?php

namespace App\Controllers;


class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Page d'accueil",
            'page' => 'home',
            'subtitle' => 'Blackinch SARL',
            'services' => $this->serviceModel->asObject()
                ->orderBy('serviceId', 'DESC')
                ->where('is_deleted', '0')->findAll(5),
            'sys_data' => $this->coordonneeModel->asObject()->first(),
            'user_data' => session()->get('user_data')
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => "A propos de nous",
            'page' => 'about',
            'subtitle' => 'Blackinch SARL',
            'services' => $this->serviceModel->asObject()
                ->orderBy('serviceId', 'DESC')
                ->where('is_deleted', '0')->findAll(5),
            'sys_data' => $this->coordonneeModel->asObject()->first(),
            'user_data' => session()->get('user_data')
        ];
        echo view('pages/about', $data);
    }


    public function contact()
    {
        $data = [
            'title' => "Contact",
            'page' => 'contact',
            'subtitle' => 'Blackinch SARL',
            'services' => $this->serviceModel->asObject()
                ->orderBy('serviceId', 'DESC')
                ->where('is_deleted', '0')->findAll(5),
            'sys_data' => $this->coordonneeModel->asObject()->first(),
            'user_data' => session()->get('user_data')
        ];

        echo view('pages/contact', $data);
    }
    
}
