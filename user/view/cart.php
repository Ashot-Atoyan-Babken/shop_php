<?php
session_start();
include 'header.php';
include '../model/UserModel.php';
$get_all_products_in_cart = $UserModel->get_all_products_in_cart();
if (!isset($_SESSION['username'])) {
   header('location:userRegister.php');
}
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
   <link rel="shortcut icon" href="../asset/img/svg/cart.svg" type="image/x-icon">
   <link rel="stylesheet" href="../asset/css/404.css">

   <title>Корзина</title>
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
                     <a href="order.php">заказы</a>
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
                     <a href="../controller/LogOutController.php"><img src="../asset/img/svg/logout.svg" alt="logout"></a>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <p class="text-center h1 mb-5 text-warning">Корзина</p>
   <div style="display:flex; justify-content:center">
      <div>
         <?php
         $total = 0;
         foreach ($get_all_products_in_cart as $cart_prod) {
            $get_all_products = $UserModel->get_all_products($cart_prod['product_id']);
            foreach ($get_all_products as $product) {
               $result = $cart_prod['quantity']  * $product['product_price'];
               $total += $result; ?>
               <div class="d-flex mb-3" style="background:white; margin-right:20vh">
                  <div>
                     <img class="card-img-top" src="../../admin/asset/img/products/<?= $product['product_image'] ?>" alt="<?= $product['product_image'] ?>">
                  </div>
                  <div>
                     <div class="d-flex align-items-center pt-3 pl-3 pr-2" style="width:500px; justify-content: space-between;">
                        <div style="order: 1;  width:250px">
                           <h3><?= $product['product_name'] ?></h3>
                        </div>
                        <div style="order: 2;">
                           <h5><?= $product['product_price'] ?> USD</h5>
                        </div>
                        <div style="order: 2; margin-left:-120px">
                           <input type="checkbox" id="<?= $product['product_id'] ?>" value="<?= $cart_prod['quantity'] ?>">
                        </div>
                     </div>
                     <div class="d-flex align-items-center ml-2" style="margin-top: 140px">
                        <p data-id="<?= $product['product_id'] ?>" data-val="<?= $username ?>" class="h5 mr-2 minus" style="cursor:pointer">-</p>
                        <input data-id="<?= $product['product_id'] ?>" data-val="<?= $username ?>" data-quan="<?= $cart_prod['quantity'] ?>" type="number" class="count" style="text-align: center; width: 75px; margin-right:10px" value="<?= $cart_prod['quantity'] ?>">
                        <p data-id="<?= $product['product_id'] ?>" data-val="<?= $username ?>" class="h5 plus" style="cursor:pointer">
                           +
                        </p>
                     </div>
                  </div>
               </div>
         <?php
            }
         }
         ?>
      </div>
      <div class="card" style="width: 18rem;">
         <div class="card-body">
            <h5 class="card-title">Итого <span class="ml-5 span"><?= $total ?></span></h5>
            <button class="btn btn-info mt-5 mb-3 create-order" data-val="<?= $username ?>">Оплатить</button>
            <p>Соглашаюсь c правилами пользования торговой площадки и возврата</p>
         </div>
      </div>
   </div>
</body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="../asset/js/script.js"></script>

</html>