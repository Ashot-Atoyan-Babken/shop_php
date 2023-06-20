<?php
session_start();
include 'header.php';
include '../model/UserModel.php';
$show_all_prod = $UserModel->show_all_prod($catId);

?>



<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../asset/css/style2.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/1.1.0/modern-normalize.min.css'>
   <link rel="shortcut icon" href="../asset/img/svg/games.svg" type="image/x-icon">

   <title>Games</title>
</head>

<body style="background: #141C24;">
   <svg aria-hidden="true" focusable="false" style="width:0;height:0;position:absolute;">
      <linearGradient id="icon-gradient">
         <stop offset="0%" stop-color="var(--color-accent-light)" />
         <stop offset="100%" stop-color="var(--color-accent-dark)" />
      </linearGradient>
   </svg>
   <div class="content">
      <div class="container">
         <div class="timeline">
            <div class="timeline__stepper">
               <div class="timeline__step is-active">
                  <svg class="timeline__icon timeline__icon--default">
                     <use href="#icon-brain" />
                  </svg>
                  <svg class="timeline__icon timeline__icon--active">
                     <use href="#icon-brain" />
                  </svg>
                  <p class="timeline__step-title">
                     <a href="../index.php">Главная</a>
                  </p>
               </div>
               <div class="timeline__step">
                  <svg class="timeline__icon timeline__icon--default">
                     <use href="#icon-bulb" />
                  </svg>
                  <svg class="timeline__icon timeline__icon--active">
                     <use href="#icon-bulb" />
                  </svg>
                  <p class="timeline__step-title">
                     О-нас
                  </p>
               </div>
               <div class="timeline__step">
                  <svg class="timeline__icon timeline__icon--default">
                     <use href="#icon-rocket" />
                  </svg>
                  <svg class="timeline__icon timeline__icon--active">>
                     <use href="#icon-rocket" />
                  </svg>
                  <p class="timeline__step-title">
                     скачать
                  </p>
               </div>
               <div class="timeline__step">
                  <svg class="timeline__icon timeline__icon--default">
                     <use href="#icon-seo" />
                  </svg>
                  <svg class="timeline__icon timeline__icon--active">
                     <use href="#icon-seo" />
                  </svg>
                  <p class="timeline__step-title">
                     Тех<br />поддержка
                  </p>
               </div>
               <div class="timeline__step">
                  <svg class="timeline__icon timeline__icon--default">
                     <use href="#icon-customers" />
                  </svg>
                  <svg class="timeline__icon timeline__icon--active">
                     <use href="#icon-customers" />
                  </svg>
                  <p class="timeline__step-title">
                     Контакты
                  </p>
               </div>
               <div class="timeline__step">
                  <svg class="timeline__icon timeline__icon--default">
                     <use href="#icon-customers" />
                  </svg>
                  <svg class="timeline__icon timeline__icon--active">
                     <use href="#icon-customers" />
                  </svg>
                  <p class="timeline__step-title">
                     <a href="../controller/CartController.php"><img src="../asset/img/svg/free_icon_1.svg"
                           alt="cart"></a>
                  </p>
               </div>
               <div class="timeline__step">
                  <svg class="timeline__icon timeline__icon--default">
                     <use href="#icon-customers" />
                  </svg>
                  <svg class="timeline__icon timeline__icon--active">
                     <use href="#icon-customers" />
                  </svg>
                  <p class="timeline__step-title">
                     <a href="../controller/LogOutController.php"><img src="../asset/img/svg/logout.svg"
                           alt="logout"></a>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="body">
      <?php
      if (count($show_all_prod) > 0) {
         foreach ($show_all_prod as $prod) { ?>
      <div class="card mr-3 mt-3 cont" style="width: 18rem;">
         <img class="card-img-top" src="../../admin/asset/img/products/<?= $prod['product_image'] ?>"
            alt="<?= $prod['product_image'] ?>">
         <div class="card-body">
            <h5 class="card-title text-center"><?= $prod['product_name'] ?></h5>
            <p class="card-text overflow-auto"><?= $prod['product_content'] ?></p>
            <h3><?= $prod['product_price'] ?> USD</h3>
            <button data-val="<?= $username ?>" data-id="<?= $prod['product_id'] ?>" type="submit"
               class="btn btn-info add" name="add">ADD To Cart</button>
         </div>
      </div>
      <?php
         }   ?>
      <?php
      } else { ?>
      <span class="error-404-wrap">
         <h1 data-t="404" class="h1">пока что ЗДЕСЬ НИЧЕГО НЕТ <br> Простите</h1>
      </span>
      <?php  } ?>
   </div>

</body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
   integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="../asset/css/404.css">
<script src="../asset/js/script.js"></script>

</html>