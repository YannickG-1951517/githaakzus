<?php

namespace App\Models;

use CodeIgniter\Model;

/** model of messages
 *
 */
class MessageModel extends Model
{
    protected $table = 'messages';

    protected $allowedFields = ['sender_id', 'receiver_id', 'message'];


    public function getRecievedMessages()
    {
        $session = session();

        $messages = $this->findAll();
        

        $recievedMessages = null;
        foreach ($messages as $message){
            if ($message['receiver_id'] == $session->get('user')['id'])
            {
                $recievedMessages[] = $message;
            }
        }
        return $recievedMessages;
    }





}





?>
