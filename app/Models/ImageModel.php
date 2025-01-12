<?php

namespace App\Model;
use App\Core\Model;

defined('ROOTPATH') OR exit('Access Denied!');

class ImageModel
{
    use Model;
    protected $table = 'images';

    
    public function insertImage($path)
    {
        $query = "INSERT INTO images (path) VALUES (?)";
        $this->query($query, [$path]);
        return $this->lastInsertId();
    }

    public function unlinkImageForeignKey($id)
    {
        $query = "UPDATE animal SET image_id = NULL WHERE image_id = ?";
        return $this->query($query, [$id]);
    }
}