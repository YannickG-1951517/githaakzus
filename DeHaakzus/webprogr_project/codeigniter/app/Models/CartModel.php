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

    $cartData = $this->findAll();

    $userCart = null;
    foreach ($cartData as $cartItem) {
      if ($cartItem['buyer_id'] == $session->get('user')['id']){
        $userCart[] = $cartItem;
      }
    }

    return $userCart;
  }





}
