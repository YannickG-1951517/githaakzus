<?php
  $session = session();

  echo $session->get('name');

  // echo "<pre>";
  // print_r($session->get('user'));

  if ($session->get('user') != null){
    echo $session->get('user')['firstname'];
  }




 ?>
