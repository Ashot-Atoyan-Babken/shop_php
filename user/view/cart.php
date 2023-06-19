<?php
session_start();
include '../model/UserModel.php';
$get_all_products_in_cart = $UserModel->get_all_products_in_cart();

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
            </div>
         </div>
      </div>
   </div>
   <p class="text-center h1 mb-5 text-warning">Корзина</p>
   <div class="d-flex justify-content-center">

      <div class="container mt-4">
         <?php
         foreach ($get_all_products_in_cart as $cart_prod) {
            $get_all_products = $UserModel->get_all_products($cart_prod['product_id']);
            foreach ($get_all_products as $product) { ?>
         <div class="card">
            <div class="row">
               <div class="col-md-6">
                  <img src="../../admin/asset/img/products/<?= $product['product_image'] ?>" class="card-img w-50"
                     alt="<?= $product['product_image'] ?>">
               </div>
               <div class="col-md-6">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-6">
                           <h5 class="card-title">Заголовок</h5>
                        </div>
                        <div class="col-md-6">
                           <div class="form-check text-right">
                              <input class="form-check-input" type="checkbox" value="" id="checkbox">
                           </div>
                           <p class="card-text">Текст описания или контента.</p>

                        </div>
                     </div>
                     <div class="row d-flex">
                        <div class="col-md-6">
                           <span>-</span>
                           <input type="number" class="w-25 text-center">
                           <span>+</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php
            }
         }
         ?>
      </div>
      <div class="card" style="width: 18rem; margin-left:250px">
         <div class="card-body">
            <h5 class="card-title">Итого <span class="ml-5">0</span>
            </h5>
            <button class="card-link btn btn-info mt-5 mb-3 create-order">Оплатить</button>
            <p>Соглашаюсь c правилами пользования торговой площадки и возврата</p>
         </div>
      </div>
   </div>
</body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
   integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
   integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
   integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<link rel="stylesheet" href="../asset/css/404.css">
<script src="../asset/js/script.js"></script>
<script>

</script>

</html>