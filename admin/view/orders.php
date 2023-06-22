<?php
include '../model/AdminModel.php';
$orders = $Admin->orders_for_admin_incoming();
$transmitted_orders = $Admin->orders_for_admin_transmitted()
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Order</title>
</head>

<body>
   <header>
      <nav class="navbar navbar-expand-lg navbar-dark p-3 bg-dark" id="headerNav">
         <div class="container-fluid">
            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav mx-auto  ">
                  <li class="nav-item my-auto">
                     <a class="nav-link mx-2" aria-current="page" href="../index.php">HOME</a>
                  </li>
                  <li class="nav-item my-auto">
                     <a class="nav-link mx-2" href="orders.php">ORDERS</a>
                  </li>
                  <li class="nav-item ml-auto">
                     <a class="nav-link mx-2 " href="controller/LogOutController.php">LOG OUT</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
   </header>
   <?php
   if (count($orders) > 0) { ?>
   <p class="h1 text-center text-uppercase mb-5 mt-3">New Orders</p>
   <table class="table table-hover mx-auto mt-5" style="width: 80%; border:1px solid #000">
      <thead class="thead-dark">
         <th class="text-center">Product image</th>
         <th class="text-center">Product name</th>
         <th class="text-center">Product price</th>
         <th class="text-center">Product quantity</th>
         <th class="text-center">Product sum</th>
         <th class="text-center">Username</th>
         <th class="text-center">Status</th>
         <th class="text-center">Action</th>
      </thead>
      <tbody>
         <?php
            foreach ($orders as $order) { ?>
         <tr>
            <td><img src="../asset/img/products/<?= $order['product_image'] ?>" alt="<?= $order['product_image'] ?>"
                  style="width: 150px; height: 150px"></td>
            <td><?= $order['product_name'] ?></td>
            <td><?= $order['product_price'] ?></td>
            <td><?= $order['quantity'] ?></td>
            <td><?= $order['quantity'] * $order['product_price']  ?></td>
            <td><?= $order['User'] ?></td>
            <td>
               <?php
                     if ($order['orderStatus'] = 'Active') {
                        $disabled = '';
                     ?>
               <span class="text-center text-danger text-uppercase">Pending</span>
               <?php
                     } else {
                        $disabled = 'disabled';   ?>
               <span class="text-center text-success text-uppercase">Confirmed</span>

               <?php  } ?>

            </td>
            <td><button class="btn btn-info confirm" type="button" data-id="<?= $order['product_id'] ?>"
                  data-email="<?= $order['e-mail'] ?>" <?= $disabled ?>>Confirmed</button></td>
         </tr>
         <?php  } ?>
      </tbody>
   </table>
   <?php } else { ?>
   <p class="h1 text-center text-uppercase mb-5 mt-3">you dont have new orders</p>
   <?php } ?>
   <p class="h1 text-center text-uppercase mb-5 mt-3">Sent Orders</p>
   <?php
   if (count($transmitted_orders) > 0) { ?>
   <table class="table table-hover mx-auto mt-5" style="width: 80%; border:1px solid #000">
      <thead class="thead-dark">
         <th class="text-center">Product image</th>
         <th class="text-center">Product name</th>
         <th class="text-center">Product price</th>
         <th class="text-center">Product quantity</th>
         <th class="text-center">Product sum</th>
         <th class="text-center">Username</th>
         <th class="text-center">Status</th>
      </thead>
      <tbody>
         <?php
            foreach ($transmitted_orders as $orders) { ?>
         <tr>
            <td><img src="../asset/img/products/<?= $orders['product_image'] ?>" alt="<?= $orders['product_image'] ?>"
                  style="width: 150px; height: 150px"></td>
            <td><?= $orders['product_name'] ?></td>
            <td><?= $orders['product_price'] ?></td>
            <td><?= $orders['quantity'] ?></td>
            <td><?= $orders['quantity'] * $orders['product_price']  ?></td>
            <td><?= $orders['User'] ?></td>
            <td>
               <?php
                     if ($orders['orderStatus'] = 'Passive') { ?>
               <span class="text-center text-success text-uppercase">Confirmed</span>

               <?php
                     } else {

                     ?>
               <span class="text-center text-danger text-uppercase">Pending</span>

               <?php  } ?>

            </td>
         </tr>
         <?php  } ?>
      </tbody>
   </table>
   <?php } else { ?>
   <p class="h1 text-center text-uppercase mb-5 mt-3">you dont have new orders</p>
   <?php } ?>
</body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
   integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="../asset/js/script.js"></script>

</html>