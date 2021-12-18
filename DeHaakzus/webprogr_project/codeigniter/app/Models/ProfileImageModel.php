<?php

namespace App\Models;

use CodeIgniter\Model;


class ProfileImageModel extends Model
{
  protected $table = 'user_images';

  protected $allowedFields = ['user_id', 'image'];


  public function getImageByUserId($id)
  {
    return $this->where(['user_id' => $id])->first();
  }




}





?>
