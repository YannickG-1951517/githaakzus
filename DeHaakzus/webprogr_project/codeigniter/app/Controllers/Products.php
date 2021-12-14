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
      $imageModel = model(ProductImageModel::class);

      $products = $model->getProducts();
      foreach ($products as $product) {
        $images[] = $imageModel->getImageByProductId($product['id']);
      }

      $data = [
        'products' => $model->getProducts(),
        'images' => $images,
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
      $imageModel = model(ProductImageModel::class);
      $session = session();

      $products = $productModel->getProducts();
      $privateProducts = null;
      $images = null;

      foreach ($products as $product) {
        if ($product['makerID'] == $session->get('user')['id']){
          $privateProducts[] = $product;
        }
      }

      if (! empty($privateProducts) && is_array($privateProducts))
        foreach ($privateProducts as $privateProduct) {
          $images[] = $imageModel->getImageByProductId($privateProduct['id']);
        }


      $data = [
        'products' => $privateProducts,
        'images' => $images,
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

      
      $data = [
        'name' => $this->request->getPost('name'),
        'slug'  => url_title($this->request->getPost('name'), '-', true),
        'price' => $this->request->getPost('price'),
        'body' => $this->request->getPost('description'),
        'makerID' => $session->get('user')['id'],
      ];
      
      $model->save($data);
      
      $file = $this->request->getFile('inputImage');
      if ($file->isValid() && !$file->hasMoved())
      {
        $newName = $file->getRandomName();
        $file->move('uploads/', $newName);
      }
      
      $imageData = [
        'image' => $newName,
        'product_id' => $model->getProducts(url_title($this->request->getPost('name'), '-', true))['id'],
      ];

      $imageModel->save($imageData);


      
      echo view('templates/header');
      echo view('products/addProduct');
      echo view('templates/footer');

    }
}



?>
