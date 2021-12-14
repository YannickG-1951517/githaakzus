<?php

namespace App\Controllers;

use App\Models\ProductImageModel;
use App\Models\ProductModel;
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

      echo view('templates/header');
      echo view('products/productList', $data);
      echo view('templates/footer');
    }


    public function view($slug = null)
    {
      $model = model(ProductModel::class);
      $data['products'] = $model->getProducts($slug);

      if (empty($data['products'])){
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the product in database: ' . $slug);
      }

      $data['name'] = $data['products']['name'];

      echo view('templates/header');
      echo view('products/singleProduct', $data);
      echo view('templates/footer');
    }

    public function personalProducts()
    {
      $productModel = model(ProductModel::class);
      $session = session();

      $products = $productModel->getProducts();

      foreach ($products as $product) {
        if ($product['makerID'] == $session->get('user')['id']){
          $privateProducts[] = $product;
        }
      }

      $data = [
        'products' => $privateProducts,
      ];

      echo view('templates/header');
      echo view('products/personalProductList', $data);
      echo view('templates/footer');

    }

    public function addProductPage()
    {
      echo view('templates/header');
      echo view('products/addProduct');
      echo view('templates/footer');
    }

    public function createProduct()
    {
      $imageModel = model(ProductImageModel::class);
      $model = model(ProductModel::class);
      $session = session();

      $file = $this->request->getFile('inputImage');
      if ($file->isValid() && !$file->hasMoved())
      {
        $newName = $file->getRandomName();
        $file->move(WRITEPATH.'uploads/', $newName);
      }

      $data = [
        'name' => $this->request->getPost('name'),
        'slug'  => url_title($this->request->getPost('name'), '-', true),
        'price' => $this->request->getPost('price'),
        'body' => $this->request->getPost('description'),
        'makerID' => 3,
      ];

      $model->save($data);

      
      echo view('templates/header');
      echo view('products/addProduct');
      echo view('templates/footer');


      
      


    }
}



?>
