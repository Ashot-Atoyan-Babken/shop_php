<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
   <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
   <link rel="stylesheet" href="../asset/css/registration.css">

   <link rel="shortcut icon" href="../asset/img/svg/user_reg.svg" type="image/x-icon">
   <title>User Registration</title>
</head>

<body style="background-color:#1f2029">
   <div class="main">
      <div class="wrapper">
         <div class="content">
            <div class="header">
               <h1>Регестрация</h1>
               <a href="userLogin.php">
                  <h2>Вход</h2>
               </a>
            </div>
            <form class="input" action="../controller/RegisterController.php" method="post">
               <input type="text" name="username" class="form-style" placeholder="Your Full Name" id="username" autocomplete="off">
               <input type="email" name="your_email" class="form-style" placeholder="Your Email" id="your_email" autocomplete="off">
               <input type="password" name="password" class="form-style" placeholder="Your Password" id="password" autocomplete="off">
               <input type="password" name="comfirm_password" class="form-style" placeholder="Comfirm Password" id="comfirm_password" autocomplete="off">
               <input class="btn mt-4 btn-dark register" type="submit" value="Зарегестрироваться" name="register">
            </form>
            <?php
            if (isset($_SESSION['error'])) { ?>
               <div class="alert alert-danger" role="alert" id="email_not_verify">
                  <?= $_SESSION['error'] ?></div>
            <?php
               unset($_SESSION['error']);
            } ?>
            <p class="p"><input type="checkbox" name="" id="checkbox">
               Я соглашаюсь со следующими установленными правилами: Политика использования файлов cookie
               WARPLAY.CLOUD, Пользовательское соглашение WARPLAY.CLOUD, Лицензионное соглашение MY.GAMES с конечным
               пользователем в отношении Игр, Лицензионное соглашение с конечным Пользователем для WARPLAY.CLOUD
               Игрового центра, Политика конфиденциальности портала WARPLAY.CLOUD, Политика конфиденциальности
               WARPLAY.CLOUD для детей</p>
            <div class="sign-in">
               <img src="../asset/img/general page/svg/Line 91.png" alt="Line 91.png">
               <h3>Войти через</h3>
               <img src="../asset/img/general page/svg/Line 91.png" alt="Line 91.png">
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

</html>