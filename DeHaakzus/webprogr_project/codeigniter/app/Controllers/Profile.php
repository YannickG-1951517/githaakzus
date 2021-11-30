<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Profile extends Controller
{
    public function index()
    {
      $session = session();

      if (empty($session->get('name'))){
        $session->set('name', 'Not logged in yet');
      }

      echo view('templates/header');
      echo view('profile/profile');
      echo view('templates/footer');
    }





}
