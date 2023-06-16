<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
   <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
   <link rel="stylesheet" href="../asset/css/sign-in.css">
   <link rel="shortcut icon" href="../asset/img/svg/user_log.svg" type="image/x-icon">
   <title>Login</title>
</head>

<body style="background-color:#1f2029">
   <div class="main">
      <div class="wrapper">
         <div class="content">
            <div class="header">
               <h1>Вход</h1>
               <a href="userRegister.php">
                  <h2>Регестрация</h2>
               </a>
            </div>
            <form class="input" action="../controller/LoginController.php" method="post">
               <div class="form-group">
                  <input type="text" name="username" class="form-style username" placeholder="Your Username" id="logemail" autocomplete="off">
                  <i class="input-icon uil uil-at"></i>
               </div>
               <div class="form-group mt-2">
                  <input type="password" name="password" class="form-style password" placeholder="Your Password" id="logpass" autocomplete="off">
                  <i class="input-icon uil uil-lock-alt"></i>
               </div>
               <input class="btn mt-4 btn-dark login" type="submit" value="LOG IN" name="login">
            </form>
            <?php
            if (isset($_SESSION['action'])) { ?>
               <div class="alert alert-danger" role="alert"><?= $_SESSION['action'] ?></div>
            <?php
               unset($_SESSION['action']);
            }
            ?>
            <div class="sign-in">
               <img src="../asset/img/general page/svg/Line 91.png" alt="">
               <h3>Войти через</h3>
               <img src="../asset/img/general page/svg/Line 91.png" alt="">
            </div>
            <div class="images__level1">
               <img src="../asset/img/general page/svg/Mail_ru.svg" alt="">
               <img src="../asset/img/general page/svg/VK.svg" alt="">
               <img src="../asset/img/general page/svg/OK.svg" alt="">
               <img src="../asset/img/general page/svg/Facebook.svg" alt="">
               <img src="../asset/img/general page/svg/Google.svg" alt="">
            </div>
            <div class="images__level2">
               <img src="../asset/img/general page/svg/Twitch.svg" alt="">
               <img src="../asset/img/general page/svg/Twitter.svg" alt="">
               <img src="../asset/img/general page/svg/Apple.svg" alt="">
            </div>
         </div>
      </div>
   </div>
</body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="../asset/js/script.js"></script>

</html>