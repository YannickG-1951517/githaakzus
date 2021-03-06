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
    $profilePictureModel = model(ProfileImageModel::class);

    $rules = [
      'email' => 'required|min_length[3]|max_length[255]|is_unique[users.email]|valid_email',
      'pword'  => 'required|min_length[3]|max_length[32]',
      'surname' => 'required|max_length[32]',
      'firstname' => 'required|max_length[32]',
    ];

    if ($this->request->getMethod() === 'post' && $this->validate($rules)) {
        $model->save([
            'email' => $this->request->getPost('email'),
            'pword'  => $this->request->getPost('pword'),
            'surname'  => $this->request->getPost('surname'),
            'firstname'  => $this->request->getPost('firstname'),
        ]);

        $file = $this->request->getFile('profileImage');
        if ($file->isValid() && !$file->hasMoved())
        {
          $newName = $file->getRandomName();
          $file->move('uploads/', $newName);
        }

        $profilePictureModel->save([
          'user_id' => $model->getUser($this->request->getPost('email'))['id'],
          'image' => $newName,
        ]);

        return redirect()->to('login');

    }else{
      echo view('templates/header');
      echo view('login/create_acc');
      echo view('templates/footer');
    }
  }

  public function login()
  {
    $model = model(UserModel::class);
    $session = session();

    $errors = [
      'pword' => [
        'validateUser' => 'Email or password incorrect'
      ]
    ];

    if ($this->request->getMethod() === 'post' && $this->validate([
      'email' => 'required|min_length[3]|max_length[255]',
      'pword'  => 'required|min_length[3]|max_length[32]',
      ])) {

        $session->set('logged-in', true);
        $session->set('user', $model->getUser($this->request->getPost('email')));

        return redirect()->to('profile');
      }
      return redirect()->to('home');

    }


    public function logout()
    {
      $session = session();
      $session->set('logged-in', false);
      $session->destroy();

      echo view('templates/header');
      echo view('login/loginForm');
      echo view('templates/footer');
    }

    public function chooseLoginOrLogout()
    {
      $session = session();
      $session->set('debug', 'test');
      if ($session->get('logged-in') == true){
        $session->set('debug', 'logout');
        $this->logout();
      }else{
        $session->set('debug', 'login');
        $this->index();
      }
    }


}
