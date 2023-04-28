<?php

namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'messages';
    protected $primaryKey       = 'msg_id';
    protected $allowedFields    = ['sender','email','phone','subject','message','created_at','upated_at'];

    public function getMessages($msg){
        if($msg === null){
            return $this->findAll();
        }
        return  $this->where(['msg_id' => $msg])->first();
    }
}
