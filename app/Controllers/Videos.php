<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Videos extends BaseController
{
    public function index()
    {
        //
    }
    public function create(){
        $user = session()->get('user_data');
        $data = [
            'title' => "Eldad Services | Ajout Vidéo",
            'validation' => null,
        ];
        if ($this->request->getMethod() == 'post') {
            $this->validation->setRules([
                'name' => [
                    'label' => 'Video',
                    'rules' => 'uploaded[name]'
                        . '|ext_in[name,mp3,mpeg,mp4]'
                        . '|max_size[name,30360]',
                    'errors' => [
                        'uploaded' => 'Ne peut pas être vide',
                        'max_size' => 'Pas plus de 20MB',
                        'ext_in' => 'Le format de la vidéo peut être mp3, mpeg ou mp4'
                    ]
                ],
                'description' => [
                    'label' => 'Description','rules' => 'required',
                    'errors' => ['required' => 'La déscription est réquise'],
                ],
            ]);
            if ($this->validation->withRequest($this->request)->run()) {  

                $file = $this->request->getFile('name');        
                
                if ($file->isValid() && !$file->hasMoved()) {
                    $videoName = $file->getRandomName();
                    $file->move('./assets/es_admin/videos', $videoName);

                    $data = array(
                        'name' => $videoName,
                        'description' => $this->request->getVar('description'),
                        'created_at' => date('Y-m-d'),
                    );  
                    $this->videoModel->insert($data);
                    $session = session();
                    $session->setFlashData("success", "Ajouté avec succès");
                    return redirect()->back();
                    
                }  
            } else {
                $data['validation'] = $this->validation->getErrors();
            }
        }
        echo view('videos/admin/create', $data);
    }

    public function edit($id){
        $data = [
            'title' => 'Editer',
            'medium' => $this->mediaModel->findMedia($id),
        ];
        return view('media/admin/edit',$data);
    }
    function update(){
       
    }
    public function changeVideo($id){

    }
    
    function deleteVideo($token){
        if (!is_logged()) return redirect()->to('/signup');
        $data['medium'] = $this->mediaModel->findMediaByToken($token);
        if(!empty($data)){
            $this->impactModel->where('media_token',$token)->delete();
            $session = session();
            $session->setFlashData("success", "Media deleted successfully");
            return redirect()->to('/media/list');
        }
    }
}
