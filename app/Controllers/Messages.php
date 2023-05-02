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
            'page' => 'contact',
            'subtitle' => 'Blackinch SARL',
            'services' => $this->serviceModel->asObject()
                ->orderBy('serviceId', 'DESC')
                ->where('is_deleted', '0')->findAll(5),
            'sys_data' => $this->coordonneeModel->asObject()->first(),
            'user_data' => session()->get('user_data')
        ];
        // Get Validations Rules from the model
        $rules = $msgModel->getValidationRules();
        
        if ($this->request->getMethod() == 'post') {
            $this->validation->setRules($rules);
            if ($this->validation->withRequest($this->request)->run()) {  
                
                $data = array(
                    'sender'        => $this->request->getVar('sender'),
                    'email'         => $this->request->getVar('email'),
                    'phone'         => $this->request->getVar('phone'),
                    'message'       => $this->request->getVar('message'),
                    'subject'       => $this->request->getVar('subject'),
                    'created_at'    => date('Y-m-d'),
                ); 
                
                $this->sendMessageToClient($data['email'], $data['sender']);
                $this->sendMessageToAdmin($data['email'], $data['sender'],$data['phone'],$data['subject'],$data['message']);

                $msgModel->insert($data);
    
                return redirect()->back()->with('success', 'Votre message été envoyé avec succès.');                    
               
            } else {
                $data['validation'] = $this->validation->getErrors();
            }
        }
        echo view('pages/contact', $data);
    }
    function sendMessageToClient($to, $name){
        
        $subject= "Votre message sur Blackinch";
      
        $this->email->setFrom('info@blackinch.com', 'Blackinch Support');
        $this->email->setTo($to);
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
    function sendMessageToAdmin($from,$name,$phone,$subject,$msg){  
        $this->email->setFrom($from);
        $this->email->setTo('info@blackinch.com');
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
        return view('mails/admin', $data);
    }
}