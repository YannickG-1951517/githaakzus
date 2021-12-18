<?php

namespace App\Controllers;

use App\Models\ProfileImageModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Profile extends Controller
{
    public function index()
    {
      $userModel = model(UserModel::class);
      $profileImageModel = model(ProfileImageModel::class);
      $session = session();


      $data = [
        'user' => $userModel->getUserById($session->get('user')['id']),
        'image' => $profileImageModel->getImageByUserId($session->get('user')['id']),
      ];


      echo view('templates/header');
      echo view('profile/profile', $data);
      echo view('templates/footer');
    }

    public function messages()
    {
      $model = model(MessageModel::class);

      $recievedMessages = $model->getRecievedMessages();
      $data = [
        'messages' => $recievedMessages,
      ];

      echo view('templates/header');
      echo view('profile/messages', $data);
      echo view('templates/footer');
      
    }

    public function newMessagePage()
    {
      echo view('templates/header');
      echo view('profile/newMessage');
      echo view('templates/footer');
    }

    public function createMessage()
    {
      $messageModel = model(MessageModel::class);
      $userModel = model(UserModel::class);

      $session = session();

      $rules = [
        'message' => 'required|max_length[1024]',
      ];

      if ($this->request->getMethod() === 'post' && $this->validate($rules)){
        $messageModel->save([
          'sender_id' => $session->get('user')['id'],
          'receiver_id' => $userModel->getUser($this->request->getPost('receiver'))['id'],
          'message' => $this->request->getPost('message'),
        ]);
        return redirect()->to('messages');

      }

      return redirect()->to('messages');

    }

    public function loadUpdatePage()
    {
      echo view('templates/header');
      echo view('profile/updateProfile');
      echo view('templates/footer');
    }



    public function updateProfile()
    {
      $userModel = model(UserModel::class);
      $userImageModel = model(UserImageModel::class);
      $session = session();
      
      $db = \Config\Database::connect();
      $builder = $db->table('users');

      $rules = [
        'email' => 'required|min_length[3]|max_length[255]|valid_email',
        'pword'  => 'required|min_length[3]|max_length[32]',
        'surname' => 'required|max_length[32]',
        'firstname' => 'required|max_length[32]',
        'street' => 'required|max_length[32]',
        'house_nr' => 'required|max_length[32]',
        'city' => 'required|max_length[32]',
        'postal_code' => 'required|max_length[32]',
        'country' => 'required|max_length[32]',
      ];

      if ($this->request->getMethod() === 'post' && $this->validate($rules))
      {
        $data = [
          'email' => $this->request->getPost('email'),
          'firstname' => $this->request->getPost('firstname'),
          'surname' => $this->request->getPost('surname'),
          'pword' => $this->request->getPost('pword'),
          'street' => $this->request->getPost('street'),
          'house_nr' => $this->request->getPost('houseNum'),
          'postal_code' => $this->request->getPost('postalcode'),
          'country' => $this->request->getPost('country'),
          'city' => $this->request->getPost('city'),
        ];

        $builder->where('id', $session->get('user')['id']);
        $builder->update($data);

      }

      return redirect()->to('profile');

    }







}
