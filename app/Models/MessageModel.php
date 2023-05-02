<?php

namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'contacts';
    protected $primaryKey       = 'msg_id';
    protected $allowedFields    = ['sender','email','phone','subject','message','created_at','upated_at'];


      // Validation
      protected $validationRules      = [
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
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function getMessages($msg){
        if($msg === null){
            return $this->findAll();
        }
        return  $this->where(['msg_id' => $msg])->first();
    }

}
