<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Controller;

class Products extends Controller
{
    public function index()
    {
      $model = model(ProductModel::class);
      $data = [
        'products' => $model->getProducts(),
        'name' => 'tempname',
      ];

      echo view('templates/header', $data);
      echo view('products/productList', $data);
      echo view('templates/footer', $data);
    }


    public function view($slug = null)
    {
      $model = model(ProductModel::class);
      $data['products'] = $model->getProducts($slug);

      if (empty($data['products'])){
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the product in database: ' . $slug);
      }

      $data['name'] = $data['products']['name'];

      echo view('templates/header', $data);
      echo view('products/singleProduct', $data);
      echo view('templates/footer', $data);
    }
}



?>
