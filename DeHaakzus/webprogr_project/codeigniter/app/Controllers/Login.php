<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Controller;

class Login extends Controller
{
  public function index()
  {
      echo view('templates/header');
      echo view('login/loginForm');
      echo view('templates/footer');
  }

  public function create()
  {
    $model = model(UserModel::class);

    if ($this->request->getMethod() === 'post' && $this->validate([
        'email' => 'required|min_length[3]|max_length[255]|is_unique[users.email]',
        'pword'  => 'required|min_length[3]|max_length[32]',
        'surname' => 'required|max_length[32]',
        'firstname' => 'required|max_length[32]',
    ], $errors)) {
        $model->save([
            'email' => $this->request->getPost('email'),
            'pword'  => $this->request->getPost('pword'),
            'surname'  => $this->request->getPost('surname'),
            'firstname'  => $this->request->getPost('firstname'),
        ]);

        //$session = \Config\Services::session($config);

        echo view('templates/header');
        echo view('profile/profile');
        echo view('templates/footer');
    }else{
      echo view('templates/header');
      echo view('login/create_acc');
      echo view('templates/footer');
    }
  }

  public function validateLogin()
  {
    $model = model(UserModel::class);

    $errors = [
      'pword' => [
        'validateUser' => 'Email or password incorrect'
      ]
    ];

    if ($this->request->getMethod() === 'post' && $this->validate([
        'email' => 'required|min_length[3]|max_length[255]|is_unique[users.email]',
        'pword'  => 'required|min_length[3]|max_length[32]',
    ])) {
      echo view('templates/header');
      echo view('login/create_acc');
      echo view('templates/footer');
    }

  }
}
