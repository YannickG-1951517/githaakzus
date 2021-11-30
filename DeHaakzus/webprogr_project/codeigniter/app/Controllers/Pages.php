<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
      if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
      }

      $data['name'] = ucfirst($page); // Capitalize the first letter

      echo view('templates/header', $data);
      echo view('pages/' . $page, $data);
      echo view('templates/footer', $data);
    }


    // public function loadHomepage($email = null)
    // {
    //   $model = model(UserModel::class);
    //
    //   $data['user'] = $model->getUser($email);
    //
    //   if (empty($data['user'])){
    //     throw new \CodeIgniter\Exception\PageNotFoundException("Cannot find the user:" . $email);
    //
    //   }
    //
    //   $data['name'] = $data['user']['name'];
    //
    //   echo view('templates/header', $data);
    //   echo view('pages/home', $data);
    //   echo view('templates/footer', $data);
    //
    // }
}
