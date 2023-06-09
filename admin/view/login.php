<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
</head>

<body>
   <form>
      <input type="text" class="username" name="username" placeholder="username">
      <input type="password" class="password" name="password" placeholder="password">
   </form>
   <button type="submit" name="action" class="login">LOG IN</button>

   <div class="alert alert-success mx-auto" role="alert" style="display:none;"></div>
   <div class="alert alert-danger" role="alert" style="display:none;"></div>
</body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
   $(function() {
      $('.login').on('click', function() {
         let username = $('.username').val();
         let password = $('.password').val();
         $.ajax({
            url: '../controller/AdminLoginController.php',
            method: 'post',
            data: {
               username,
               password,
               dataType: 'json',
               action: 'login',
            },
            success: function(data) {
               let jsonparse = JSON.parse(data);
               console.log(jsonparse.action);
               if (jsonparse.action == 1) {
                  $('.alert-success').html(jsonparse.message)
                  $('.alert-success').fadeIn()
                  $('.alert-success').fadeOut(2000)
                  setTimeout(() => {
                     location.href = '../index.php'
                  }, 2500);
               } else if (jsonparse.action == 0) {
                  $('.alert-danger').html(jsonparse.message)
                  $('.alert-danger').fadeIn()
                  $('.alert-danger').fadeOut(2000)
                  setTimeout(() => {
                     location.reload()
                  }, 2500);
               }
            }
         })

      })
   })
</script>

</html>