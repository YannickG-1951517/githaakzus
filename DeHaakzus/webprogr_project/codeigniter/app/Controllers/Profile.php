<?php

namespace App\Controllers;

use App\Models\UserModel;
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







}
