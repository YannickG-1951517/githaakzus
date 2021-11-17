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



}





?>
