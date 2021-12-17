<?php

namespace App\Models;

use CodeIgniter\Model;

/** model of products
 *
 */
class ProductModel extends Model
{
  protected $table = 'products';


  protected $allowedFields = ['name', 'slug', 'price', 'body', 'makerID'];


/** function to return one or all products
 *  returns one products if slug is given, else returns them all
 */
  public function getProducts($slug = false)
  {
    if ($slug === false){
      return $this->findAll();
    }
    return $this->where(['slug' => $slug])->first();
  }

  public function getProductsFromMaker($id)
  {

    return $this->where(['makerID' => $id])->first();
  }





}





?>
