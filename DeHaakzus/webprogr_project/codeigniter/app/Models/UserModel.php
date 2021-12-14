<?php

namespace App\Models;

use CodeIgniter\Model;

/** model of users
 *
 */
class UserModel extends Model
{
  protected $table = 'users';

  protected $allowedFields = ['email', 'pword', 'surname', 'firstname'];


  public function getUserById($id)
  {
    return $this->where(['id' => $id])->first();
  }

  public function getUser($email)
  {
    return $this->where(['email' => $email])->first();
  }





}
?>
