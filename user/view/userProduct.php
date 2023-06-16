<?php
include '../model/UserModel.php';
include 'header.php';


$show_all_prod = $UserModel->show_all_prod($catId);

if (count($show_all_prod) > 0) {

   foreach ($show_all_prod as $prod) { ?>
      <div>
         <img src="../../admin/asset/img/products/<?= $prod['product_image'] ?>" alt="">
         <h3><?= $prod['product_name'] ?></h3>
         <h3><?= $prod['product_price'] ?></h3>
         <h5><?= $prod['product_content'] ?></h5>
         <button data-val="<?= $username ?>">ADD To Card</button>
      </div>
   <?php
   }
   ?>
<?php

} ?>