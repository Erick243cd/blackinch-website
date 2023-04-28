<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{

    public function index()
    {
        $data = [

            'title' => 'Dashboard | ' . altData(),

            'users' => count($this->userModel->where('status', 'active')->findAll()),
            'posts' => count($this->postModel->where('is_deleted', '0')->findAll()),
            'podcasts' => count($this->podcastModel->where('is_deleted', '0')->findAll()),

            'user_data' => session()->get('user_data')
        ];

        return view('dashboard/index', $data);
    }
}
