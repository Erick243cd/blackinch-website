<?php

namespace App\Models;

use CodeIgniter\Model;

class PodcastModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'podcasts';
    protected $primaryKey       = 'podcastId';
    protected $useAutoIncrement = true;

    protected $allowedFields    = ['podcastId', 'title', 'slug', 'audioFile', 'category_id', 'created_at', 'updated_at', 'is_active','is_deleted', 'is_featured'];
}
