<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
  protected $table = 'cart';


  protected $allowedFields = ['product_id', 'buyer_id', 'amount'];


  public function getCartFromUser()
  {
    $session = session();
    $model = model(ProductModel::class);

    return $model->getProductsFromMaker($session->get('user')['id']);
  }



}
