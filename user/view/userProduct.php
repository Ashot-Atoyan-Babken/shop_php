<?php
include 'header.php';
include '../model/UserModel.php';

$show_all_prod = $UserModel->show_all_prod($catId);

?>



<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Games</title>
</head>

<body style="background: #141C24;">
   <div class="d-flex justify-content-center align-item-center">
      <?php
      if (count($show_all_prod) > 0) {
         foreach ($show_all_prod as $prod) { ?>
            <div class="card mr-3 mt-3" style="width: 18rem;">
               <img class="card-img-top" src="../../admin/asset/img/products/<?= $prod['product_image'] ?>" alt="<?= $prod['product_image'] ?>">
               <div class="card-body">
                  <h5 class="card-title text-center"><?= $prod['product_name'] ?></h5>
                  <p class="card-text"><?= $prod['product_content'] ?></p>
                  <h3><?= $prod['product_price'] ?> USD</h3>
                  <button data-val="<?= $username ?>" class="btn btn-info">ADD To Card</button>
               </div>
            </div>
         <?php
         }
         ?>
      <?php
      } else { ?>
         <div class="error-404-wrap">
            <h1 data-t="404" class="h1">пока что ЗДЕСЬ НИЧЕГО НЕТ <br> Простите</h1>
         </div>
      <?php  } ?>


   </div>
</body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="../asset/css/404.css">

</html>