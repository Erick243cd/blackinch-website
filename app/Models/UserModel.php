<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';  
    protected $table            = 'users';
    protected $primaryKey       = 'u_id';

    protected $allowedFields    = ['u_firstname','u_lastname','u_email','u_role','u_password','u_picture','phone','created_at','status'];
    
    /** Getting all Initiatives
     * @param $id
     * @return array|object|null
     */
    public function findUserByEmail($email){
        if($email === null){
            return $this->findAll();
        }
        return  $this->where(['u_email' => $email])->first();
    }
    public function findUserByID($id){
        if($id === null){
            return $this->findAll();
        }
        return  $this->where(['u_id' => $id])->first();
    }
    public function findUserByToken($token){
        if($token === null){
            return $this->findAll();
        }
        return  $this->where(['token' => $token])->first();
    }
}
