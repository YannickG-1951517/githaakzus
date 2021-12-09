<?php
  $session = session();

  if ($session->get('logged-in') == true){
    echo $session->get('user')['firstname'];
  }




 ?>
