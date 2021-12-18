<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Model;

class Cart extends Controller
{
  public function index()
  {
    $model = model(CartModel::class);
    $productModel = model(ProductModel::class);
    $imageModel = model(ProductImageModel::class);

    
    $cart = $model->getCartFromUser();
    foreach ($cart as $cartItem) {
      $products[] = $productModel->getProductById($cartItem['product_id']);
      $images[] = $imageModel->getImageByProductId($cartItem['product_id']);
    }

    
    $data = [
      'products' => $products,
      'cartItem' => $cart,
      'images' => $images,
    ];


    echo view('templates/header');
    echo view('profile/cart', $data);
    echo view('templates/footer');
  }

  public function addProduct($id)
  {
    $model = model(CartModel::class);
    $session = session();
    
    $data = [
      'product_id' => $id,
      'buyer_id' => $session->get('user')['id'],
    ];

    $model->save($data);

    return redirect()->to('products');
  }



}
