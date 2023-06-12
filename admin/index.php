<?php
session_start();
include 'model/AdminModel.php';
if (!isset($_SESSION['username'])) {
   header('location:view/registration.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="asset/img/admin.png" type="image/x-icon">
   <title>Admin Page</title>
</head>

<body>

   <?php
   include 'view/header.php';
   $show_all_categories = $Admin->show_all_active_categories();
   if (count($show_all_categories) > 0) { ?>
      <table class="table table-hover mx-auto mt-5" style="width: 60%;border:1px solid #000">
         <thead>
            <tr>
               <th class="text-center">Category Name</th>
               <th class="text-center">Actions</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($show_all_categories as $category) { ?>
               <tr>
                  <td contenteditable class="category_name text-center"><?= $category['title'] ?></td>
                  <td class="text-center">
                     <a href="view/product.php?id=<?= $category['id'] ?>" class="btn btn-info open_prod" target="_blank" data-id="<?= $category['id'] ?>">OPEN</a>
                     <button class="btn btn-warning update_cat" data-id="<?= $category['id'] ?>">UPDATE</button>
                     <button class="btn btn-danger delete_cat" data-id="<?= $category['id'] ?>">DELETE</button>
                  </td>
               </tr>
            <?php } ?>
         </tbody>
      </table>
   <?php } else { ?>
      <p class="text-center">NO result to display</p>
   <?php } ?>
   <div class="alert alert-danger" role="alert" id="email_not_verify" style="display:none;"></div>
   <div class="alert alert-success mx-auto" role="alert" id="email_verify" style="display:none;"></div>


</body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="asset/js/script.js"></script>

</html>