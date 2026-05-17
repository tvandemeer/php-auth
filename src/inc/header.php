<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="noindex, nofollow">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    <title><?= $title ?? 'Home' ?></title>
</head>
<body>
  <nav id="topnav">
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo">&nbsp;/dev/null</a>
      <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <?php
        if (!is_user_logged_in()) { 
          echo '<li ';
          if($_SERVER["REQUEST_URI"] === "/register.php") { echo 'class="active"'; };
          echo '><a href="register.php">Register</a></li>';
          echo '<li ';
          if($_SERVER["REQUEST_URI"] === "/login.php") { echo 'class="active"'; };
          echo '><a href="login.php">Login</a></li>';
        }
        if (is_user_logged_in()) { 
          echo '<li ';
          if($_SERVER["REQUEST_URI"] === "/guestbook.php") { echo 'class="active"'; };
          echo '><a href="guestbook.php">Guestbook</a></li>';
          echo '<li><a class="btn waves-effect waves-light orangebtn" href="logout.php">Logout</a></li>';
        }
        ?>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-nav">
    <?php
    if (!is_user_logged_in()) { 
      echo '<li ';
      if($_SERVER["REQUEST_URI"] === "/register.php") { echo 'class="active"'; };
      echo '><a href="register.php">Register</a></li>';
      echo '<li ';
      if($_SERVER["REQUEST_URI"] === "/login.php") { echo 'class="active"'; };
      echo '><a href="login.php">Login</a></li>';
    }
    if (is_user_logged_in()) { 
      echo '<li ';
      if($_SERVER["REQUEST_URI"] === "/guestbook.php") { echo 'class="active"'; };
      echo '><a href="guestbook.php">Guestbook</a></li>';
      echo '<li><a class="btn waves-effect waves-light orangebtn" href="logout.php">Logout</a></li>';
    }
    ?>
  </ul>
  
<div class="container animate__animated animate__fadeIn">
  
<?php flash() ?>
