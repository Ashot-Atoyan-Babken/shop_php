<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
   <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
   <link rel="stylesheet" href="../asset/css/style.css">
   <link rel="shortcut icon" href="../asset/img/svg/registration.svg" type="image/x-icon">
   <title>Registration</title>

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
                                 <h4 class="mb-4 pb-3 text-warning text-uppercase">Sign Up</h4>
                                 <div class="form-group">
                                    <input type="text" name="username" class="form-style" placeholder="Your Full Name" id="username" autocomplete="off">
                                    <i class="input-icon uil uil-user"></i>
                                    <div class="alert alert-danger" role="alert" id="username_alert" style="display:none;"></div>
                                 </div>
                                 <div class="form-group mt-2">
                                    <input type="email" name="your_email" class="form-style" placeholder="Your Email" id="your_email" autocomplete="off">
                                    <i class="input-icon uil uil-at"></i>
                                    <div class="alert alert-danger" role="alert" id="email_alert" style="display:none;">
                                    </div>
                                 </div>
                                 <div class="form-group mt-2">
                                    <input type="password" name="password" class="form-style" placeholder="Your Password" id="password" autocomplete="off">
                                    <i class="input-icon uil uil-lock-alt"></i>
                                    <div class="alert alert-danger" role="alert" id="password_alert" style="display:none;"></div>
                                 </div>
                                 <div class="form-group mt-2">
                                    <input type="password" name="comfirm_password" class="form-style" placeholder="Comfirm Password" id="comfirm_password" autocomplete="off">
                                    <i class="input-icon uil uil-lock-alt"></i>
                                    <div class="alert alert-danger" role="alert" id="comf_pass_alert" style="display:none;"></div>
                                 </div>
                                 <input class="btn mt-4 btn-dark register" type="submit" value="Register" name="register">
                                 <div class="alert alert-danger" role="alert" id="email_not_verify" style="display:none;"></div>
                                 <div class="alert alert-success mx-auto" role="alert" id="email_verify" style="display:none;"></div>

                                 <p class="text-start text-warning text-uppercase fs-8 pt-4">Already have an account? <a href="../view/login.php">Log in</a>
                                 </p>
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