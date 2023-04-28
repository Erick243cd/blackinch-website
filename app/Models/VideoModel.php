<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'videos';
    protected $primaryKey       = 'vid_id';
    protected $allowedFields    = ['name','description','picture','created_at','updated_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getVideo($id){
        if($id === null){
            return $this->findAll();
        }
        return  $this->where(['vid_id' => $id])->first();
    }

}
