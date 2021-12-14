<?php

namespace App\Models;

use CodeIgniter\Model;


class ProductImageModel extends Model
{
  protected $table = 'product_images';


  protected $allowedFields = ['product_id', 'image'];


  public function getImageByProductId($id)
  {
    return $this->where(['product_id' => $id])->first();
  }




}





?>
