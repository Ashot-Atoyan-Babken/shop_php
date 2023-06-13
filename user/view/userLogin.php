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
   <link rel="stylesheet" href="../asset/css/style.css">
   <link rel="shortcut icon" href="../asset/img/svg/user_log.svg" type="image/x-icon">
   <title>Login</title>
</head>

<body style="background-color:#1f2029">
   <div class="section">
      <div class="container">
         <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
               <div class="section pb-5 pt-5 pt-sm-2 text-center">
                  <div class="card-3d-wrap mx-auto">
                     <div class="card-3d-wrapper">
                        <div class="card-front">
                           <div class="center-wrap">
                              <div class="section text-center">
                                 <h4 class="mb-4 pb-3 text-warning text-uppercase">Log In</h4>
                                 <form action="../controller/LoginController.php" method="post">
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
                                 <div class="alert alert-success mx-auto" role="alert" style="display:none;"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
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