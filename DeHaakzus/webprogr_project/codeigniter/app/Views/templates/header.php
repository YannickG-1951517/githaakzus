<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>De Haakzus</title>
    <link rel="stylesheet" href="/CSS/general.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="loginForm.css">
  </head>
  <body style="background-image: url(/Images/Clouds_Background.jpg)">
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light shadow wide-text">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">De Haakzus</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/products">Producten</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Profiel
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/profile">
                  <?php
                  $session = session();
                  if ($session->get('logged-in')){
                    echo $session->get('user')['firstname'];
                  }
                  ?>
                </a></li>
                <div class="
                <?php
                    if ($session->get('logged-in') && !$session->get('user')['Admin'])
                    {
                      echo "d-none";
                    }elseif(!$session->get('logged-in')){
                      echo "d-none";
                    }
                ?>
                ">
                  <li>
                    <a class="dropdown-item" href="/personalProducts">Mijn producten</a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                </div>
                <?php if($session->get('logged-in')): ?>
                  <li>
                    <a class="dropdown-item" href="/messages">Berichten</a>
                  </li>
                  <li><hr class="dropdown-divider"></li>                  
                <?php endif ?>
                <li><a class="dropdown-item" href="/determineLoginStatus">
                  <?php
                    if ($session->get('logged-in')){
                      echo "Logout";
                    }else{
                      echo "Login";
                    }
                   ?>
                </a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if (!$session->get('logged-in')){echo "disabled";} ?>" href="/cart" tabindex="-1" aria-disabled="true">Winkelwagen</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
