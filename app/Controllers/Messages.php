<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MessageModel;

class Messages extends BaseController
{
    public function index()
    {
        $msgModel = model(MessageModel::class);
        $data = [
            'title'         => "Nous Contacter'",
            'validation'    => null,
            'coords'    =>  $this->coordModel->first()
        ];
        if ($this->request->getMethod() == 'post') {
            $this->validation->setRules([
                'sender' => [
                    'label' => 'Nom','rules' => 'required',
                    'errors' => ['required' => 'Votre nom est réquis'],
                ],
                'email'       => [
                    'label'     => 'Email',
                    'rules'     => 'required|valid_email',
                    'errors'    => [
                        'required'      => 'Complètez ce champ',
                        'valid_email'   => 'Entrez une adresse email valide.'
                    ]
                ],
                'phone'  => [
                    'label' => 'Téléphone', 'rules' => 'required',
                    'errors' => [
                        'required' => 'Complètez votre numéro de téléphone',
                    ]
                ],
                'subject'  => [
                    'label' => 'Objet', 'rules' => 'required',
                    'errors' => [
                        'required' => 'Complètez ce champ',
                    ]
                ],
                'message'  => [
                    'label' => 'Message', 'rules' => 'required',
                    'errors' => [
                        'required' => 'Remplissez votre message dans le champ ci-haut',
                    ]
                ],
            ]);
            if ($this->validation->withRequest($this->request)->run()) {  
                
                $data = array(
                    'sender'        => $this->request->getVar('sender'),
                    'email'         => $this->request->getVar('email'),
                    'phone'         => $this->request->getVar('phone'),
                    'message'       => $this->request->getVar('message'),
                    'subject'       => $this->request->getVar('subject'),
                    'created_at'    => date('Y-m-d'),
                ); 
                $msgModel->insert($data);
        
                $this->sendMessageToClient($data['email'], $data['sender']);
                $this->sendMessageToAdmin($data['email'], $data['sender'],$data['phone'],$data['message']);
                $session = session();
                $session->setFlashData("success", "Ajouté avec succès");
                return redirect()->to('/dashboard');                    
               
            } else {
                $data['validation'] = $this->validation->getErrors();
            }
        }
        echo view('pages/contact', $data);
    }
    function sendMessageToClient($to, $name){
        $subject= "Inscription sur Eldad Services";
        // $content = "Nous vous envoyons ce mail pour vous confirmer de votre inscription sur notre site Eldad Services. <br>
        //             Le mot de passe par défaut est 123456, connectez-vous pour le modifier";
        $this->email->setFrom('info@eldadservices.com', 'Admin Eldad Services');
        $this->email->setTo($to);
        $this->email->setCC('archangeche@gmail.com');
        $this->email->setSubject($subject);
        $this->email->setMessage($this->mailContentClient($name));
        if($this->email->send()){
            return true;
        }else {
           return true;
        }
    }
    function mailContentClient($name){
        $data = [
            'user'      => $name,
        ];
        return view('mails/message', $data);
    }
    function sendMessageToAdmin($from, $name,$phone,$msg){
        $subject= "Message sur Eldad Services";
        // $content = "Nous vous envoyons ce mail pour vous confirmer de votre inscription sur notre site Eldad Services. <br>
        //             Le mot de passe par défaut est 123456, connectez-vous pour le modifier";
        $this->email->setFrom($from);
        $this->email->setTo('info@eldadservices.com');
        $this->email->setCC('archangeche@gmail.com');
        $this->email->setSubject($subject);
        $this->email->setMessage($this->mailContentAdmin($name,$phone,$msg));
        if($this->email->send()){
            return true;
        }else {
           return true;
        }
    }
    function mailContentAdmin($name,$phone,$msg){
        $data = [
            'user'    => $name,
            'phone'   => $phone,
            'msg'     => $msg,
        ];
        return view('mails/admin_admin', $data);
    }
}
