<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>De Haakzus</title>
    <link rel="stylesheet" href="/CSS/general.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/CSS/Homepage.css">
    <link rel="stylesheet" href="loginForm.css">
  </head>
  <body class="mt-5" style="background-image: url(/Images/Clouds_Background.jpg)">
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light bg-gradient">
      <div class="container">
        <ul class="navbar-nav">
          <li class="nav-item"><a href="products">Producten</a></li>
          <li class="nav-item">
            <div class="dropdown bar-item nav-button bar-item py-0 align-middle">
              <button type="button nav-button" class="btn btn-primary dropdown-toggle" id="profile-menu-dropdown" data-bs-toggle="dropdown">
                Profiel
              </button>
              <ul class="dropdown-menu" aria-labelledby="profile-menu-dropdown">
                <li class="dropdown-item">
                  <?php
                  $session = session();
                  if ($session->get('logged-in') == true){
                    echo $session->get('user')['firstname'];
                  }
                   ?>
                </li>
                <li><a class="dropdown-item" href="Login/determineLoginStatus">
                  <?php
                    $session = session();
                    if ($session->get('logged-in') == true){
                      echo "Logout";
                    }else{
                      echo "Login";
                    }
                  ?></a></li>
              </ul>
            </div>
          </li>
        </ul>

      </div>

    </nav>




    <header class="top-bar padding black-on-white shadow wide-text">
      <a href="/" id="title" class="nav-button"><strong>De Haakzus</strong></a>
      <div id="wrapper sticky-top">
        <nav id="horizontal">
          <div class="right-nav">
            <!-- <a href="login" class="bar-item nav-button align-middle">Login</a> -->
            <a href="products" class="bar-item nav-button align-middle">Producten</a>
            <!-- <a href="profile" class="bar-item nav-button align-middle">Profiel</a> -->
            <!-- <a href="Messages.html" class="bar-item nav-button">Berichten</a> -->
            <!-- <a href="ShoppingCart.html" class="bar-item nav-button">Winkelmand</a> -->
            <div class="dropdown bar-item nav-button bar-item py-0 align-middle">
              <button type="button nav-button" class="btn btn-primary dropdown-toggle" id="profile-menu-dropdown" data-bs-toggle="dropdown">
                Profiel
              </button>
              <ul class="dropdown-menu" aria-labelledby="profile-menu-dropdown">
                <li class="dropdown-item">
                  <?php
                  $session = session();
                  if ($session->get('logged-in') == true){
                    echo $session->get('user')['firstname'];
                  }
                   ?>
                </li>
                <li><a class="dropdown-item" href="Login/determineLoginStatus">
                  <?php
                    $session = session();
                    if ($session->get('logged-in') == true){
                      echo "Logout";
                    }else{
                      echo "Login";
                    }
                  ?></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- <div class="content bg-light pt-4" style="max-width: 1500px" > -->
