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
        'pwd'  => 'required|min_length[3]|max_length[32]',
        'surname' => 'required|max_length[32]',
        'firstName' => 'required|max_length[32]',
    ])) {
        $model->save([
            'email' => $this->request->getPost('email'),
            'pword'  => $this->request->getPost('pword'),
            'surname'  => $this->request->getPost('surname'),
            'firstname'  => $this->request->getPost('firstname'),
        ]);
        echo view('profile/profile');
    }else{
      echo view('templates/header');
      echo view('login/create_acc');
      echo view('templates/footer');
    }
  }
}
