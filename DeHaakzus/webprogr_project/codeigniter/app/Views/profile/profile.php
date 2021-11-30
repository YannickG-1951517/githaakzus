<?php
  $session = session();

  echo $session->get('name');

  // echo "<pre>";
  // print_r($session->get('user'));

  echo $session->get('user')['firstname'];




 ?>
