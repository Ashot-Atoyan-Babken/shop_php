<?php
include '../model/AdminModel.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="../asset/img/svg/product.svg" type="image/x-icon">
   <title>Product</title>
</head>

<body>
   <header>
      <nav class="navbar navbar-expand-lg navbar-dark p-3 bg-dark" id="headerNav">
         <div class="container-fluid">
            <a class="navbar-brand d-block d-lg-none" href="#">
               <img src="/static_files/images/logos/logo_2_white.png" height="80" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav mx-auto  ">
                  <li class="nav-item my-auto">
                     <a class="nav-link mx-2" aria-current="page" href="../index.php">HOME</a>
                  </li>
                  <li class="nav-item d-none d-lg-block">
                     <img src="../asset/img/admin.png" height="50" />
                  </li>
                  <li class="nav-item my-auto">
                     <a class="nav-link mx-2" href="#">ORDERS</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
   </header>

   <div class="row mx-auto mt-5 w-25">
      <div class="col">
         <label for="Product_Name" class="form-label">Name</label>
         <input type="text" class="form-control" id="Product_Name" name="prod_name" placeholder="Product Name">
         <div class="alert alert-danger" role="alert" id="name_alert" style="display:none;"></div>
      </div>
      <div class="col">
         <label for="Product_Price" class="form-label">Price</label>
         <input type="number" class="form-control" id="Product_Price" name="prod_price" placeholder="Product Price">
         <div class="alert alert-danger" role="alert" id="price_alert" style="display:none;"></div>

      </div>
   </div>
   <div class="mb-3 mx-auto mt-3 w-25">
      <label for="Description" class="form-label">Description</label>
      <textarea class="form-control" id="Description" rows="3" name="prod_desc" placeholder="Product Description"></textarea>
      <div class="alert alert-danger" role="alert" id="desc_alert" style="display:none;"></div>

   </div>
   <div class="mb-3 mx-auto mt-3 w-25">
      <label for="formFile" class="form-label">image</label>
      <input type="file" name="prod_img" id="formFile">
      <div class="alert alert-danger" role="alert" id="img_alert" style="display:none;"></div>
   </div>


   <div class="mb-3 mx-auto w-25">
      <button type="submit" class="btn btn-success mt-3 mx-auto add_prod">ADD PRODUCT</button>
   </div>
   <div class="alert alert-danger" role="alert" id="email_not_verify" style="display:none;"></div>
   <div class="alert alert-success mx-auto" role="alert" id="email_verify" style="display:none;"></div>
   <?php
   $all_products = $Admin->all_products();
   if (count($all_products) > 0) { ?>
      <table class="table table-hover mx-auto mt-5" style="width: 60%;border:1px solid #000">
         <thead>
            <tr>
               <th class="text-center">Image</th>
               <th class="text-center">Name</th>
               <th class="text-center">Price</th>
               <th class="text-center">Description</th>
               <th class="text-center">Status</th>
               <th class="text-center">Action</th>
            </tr>
         </thead>
         <tbody>
            <?php
            foreach ($all_products as $product) { ?>
               <tr>
                  <td class="product_image text-center"><img class="img-fluid" style="width:50px;height:50px;" src="../asset/img/products/<?= $product['product_image'] ?>" alt="<?= $product['product_image'] ?>">
                  </td>
                  <td class="product_name text-center"><?= $product['product_name'] ?></td>
                  <td class="product_price text-center"><?= $product['product_price'] ?> USD</td>
                  <td class="product_content text-center"><?= $product['product_content'] ?></td>
                  <td class="product_status text-center"><?= $product['product_status'] ?></td>
                  <td class="text-center">
                     <button type="button" class="btn btn-primary" data-id="<?= $product['id'] ?>" data-toggle="modal" data-target="#exampleModal">
                        UPDATE
                     </button>
                     <button type="button" class="btn btn-danger delete_prod" data-id="<?= $product['id'] ?>">DELETE</button>
                  </td>
               </tr> <?php  } ?>
         </tbody>
      </table>
      <div class="alert alert-danger" role="alert" id="delete_failed" style="display:none;"></div>
      <div class="alert alert-success mx-auto" role="alert" id="delete_succ" style="display:none;"></div>
   <?php } else { ?>
      <p class="text-center">NO result to display</p>
   <?php } ?>
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel"><?= $product['product_name'] ?></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col">
                     <label for="Product_Name" class="form-label">Name</label>
                     <input type="text" class="form-control" id="new_Product_Name" name="prod_name" placeholder="Product Name" value="<?= $product['product_name'] ?>">
                  </div>
                  <div class="col">
                     <label for="Product_Price" class="form-label">Price</label>
                     <input type="number" class="form-control" value="<?= $product['product_price'] ?>" id="new_Product_Price" name="prod_price" placeholder="Product Price">
                  </div>
               </div>
               <div class="mb-3 ">
                  <label for="Description" class="form-label">Description</label>
                  <textarea class="form-control" id="new_Description" rows="3" name="prod_desc" placeholder="Product Description"><?= $product['product_content'] ?></textarea>

               </div>
               <div class="mb-3">
                  <label for="formFile" class="form-label">Image</label>
                  <input type="file" name="prod_img" id="new_formFile" value="<?= $product['product_image'] ?>">
               </div>
               <div class="mb-3">
                  <label for="formFile" class="form-label">Status</label>
                  <select class="form-select" aria-label="Default select example" id="select">
                     <option value="1" selected>ACTIVE</option>
                     <option value="0">PASSIVE</option>
                  </select>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary update_prod" data-id="<?= $product['id'] ?>">Save
                  changes</button>
            </div>
            <div class="alert alert-danger mx-auto" role="alert" style="display:none;"></div>
            <div class="alert alert-success mx-auto" role="alert" style="display:none;"></div>

         </div>
      </div>
   </div>

   <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
      <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
         <div class="toast-header">
            <img src="..." class="rounded me-2" alt="...">
            <strong class="me-auto">Bootstrap</strong>
            <small>11 мин назад</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button>
         </div>
         <div class="toast-body">
            Привет, мир! Это тост-сообщение.
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