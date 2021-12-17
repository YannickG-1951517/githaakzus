<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Cart extends Controller
{
  public function index()
  {
    $model = model(CartModel::class);
    $data = [
      'products' => $model->getCartFromUser(),
    ];

    echo view('templates/header');
    echo view('profile/cart', $data);
    echo view('templates/footer');
  }



}
