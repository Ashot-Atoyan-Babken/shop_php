<?php
session_start();
include("model/UserModel.php");
if (!isset($_SESSION['username'])) {
   header('location:view/userRegister.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>General Gaming</title>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/1.1.0/modern-normalize.min.css'>
   <link rel="stylesheet" href="asset/css/general.css">
   <link rel="stylesheet" href="asset/css/style2.css">
   <link rel="shortcut icon" href="asset/img/general page/svg/icons8-облако-50.png" type="image/x-icon">


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
                     Главная
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
                  <li class="dropdown timeline__step-title">
                     <div data-toggle="dropdown">
                        Категории
                     </div>
                     <div class="dropdown-menu">
                        <?php $showAllCAt = $UserModel->show_all_category();
                        foreach ($showAllCAt as $cat) { ?>
                           <a class="dropdown-item" href="view/userProduct.php?catId=<?= $cat["id"] ?>"><?= $cat["title"] ?></a>
                        <?php }
                        ?>
                     </div>
                  </li>
               </div>
               <div class="timeline__step">
                  <svg class="timeline__icon timeline__icon--default">
                     <use href="#icon-customers" />
                  </svg>
                  <svg class="timeline__icon timeline__icon--active">
                     <use href="#icon-customers" />
                  </svg>
                  <p class="timeline__step-title">
                     <a href="view/cart.php"><img src="asset/img/svg/free_icon_1.svg" alt="cart"></a>
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
                     <a href="controller/LogOutController.php"><img src="asset/img/svg/logout.svg" alt="logout"></a>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="header__stalker">
      <span>Сервис облачного гейминга </span>
      <h1>Преврати свое устройство в игровое </h1>
      <p>UPGRADE</p>
   </div>
   </header>
   <div class="firstlevel">
      <div class="wrapper">
         <div class="main__flex">
            <div class="flex__left">
               <img src="asset/img/general page/comp.png" alt="comp.png">
            </div>
            <div class="flex__right">

               <h2><img src="asset/img/general page/svg/line.svg" alt="line.svg"> Облачный гейминг</h2>
               <p>Наши сервера запускают игру, и передают
                  вам картинку, которой вы можете управлять
                  в реальном времени!</p>
               <p>Приложение запустится на ПК с процессором
                  от 1.5 GHz , от 1 Gb RAM и доступом в интернет
                  от 15 мбит/с
                  на всех операционых системах
                  Windows 7, 8, 10 MacOS и Linux .
               </p>
               <a href="#">Загрузить</a>
            </div>
         </div>
      </div>

   </div>
   <div class="secondlevel">
      <div class="wrapper">
         <div class="level">
            <h3><img src="asset/img/general page/svg/line.svg" alt="">Быстрый старт</h3>
            <p>Начни играть</p>
         </div>
         <div class="level__flex">
            <div class="logos">
               <img src="asset/img/general page/svg/Mail Contact.png" alt="">
               <p>Cоздайте аккаунт</p>
            </div>
            <img src="asset/img/general page/svg/line.svg" alt="">
            <div class="logos">
               <img src="asset/img/general page/svg/Download from the Cloud.png" alt="">
               <p>Cкачайте модуль</p>
            </div>
            <img src="asset/img/general page/svg/line.svg" alt="">
            <div class="logos">
               <img src="asset/img/general page/svg/Ds3 Tool.png" alt="">
               <p>Выберите тариф </p>
            </div>
            <img src="asset/img/general page/svg/line.svg" alt="">
            <div class="logos">
               <img src="asset/img/general page/svg/Apple Arcade.png" alt="">
               <p>Начни играть
               </p>
            </div>
         </div>
         <!-- <a href="choice.html">Начать</a> -->
      </div>
   </div>
   <div class="thirdlevel">
      <div class="wrapper">
         <div class="third__level">
            <p><img src="asset/img/general page/svg/line.svg" alt="">Гибкие тарифы</p>
            <h3>Доступные подписки </h3>
         </div>
         <div class="third__level_flex">
            <div class="subscripe">
               <div class="subscripe__text">
                  <h2>Почасовая <br> оплата</h2>
                  <p>45 р. - час</p>
                  <span>Доступно: <br><br>
                     Каталог игр<br><br>
                     Виртуальный ПК<br><br>
                     Безлимитная игровая сессия
                  </span>
                  <div class="subscripe__button">
                     <p>Выбрать</p>
                  </div>
               </div>
            </div>
            <div class="subscripe">
               <div class="subscripe__text">
                  <h2>Подписка <br> Максимум</h2>
                  <p>2999 р. - месяц</p>
                  <span>Доступно: <br><br>
                     Каталог игр<br><br>
                     Виртуальный ПК<br><br>
                     Игровая сессия 10 часов/день</span>
                  <div class="subscripe__button">
                     <p>Выбрать</p>
                  </div>
               </div>
            </div>
            <div class="subscripe">
               <div class="subscripe__text">
                  <h2>Подписка <br> Минимум</h2>
                  <p>1500 р. - месяц</p>
                  <span>Доступно: <br><br>
                     Каталог игр<br><br>
                     Игровая сессия 4 часов/день</span>
                  <div class="subscripe__button">
                     <p>Выбрать</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="line"> <img src="asset/img/general page/svg/line blue.png" alt=""></div>
   <div class="fortylevel">
      <div class="wrapper">
         <div class="levelfour">
            <div class="level__text">
               <div class="level__text_header">
                  <p><img src="asset/img/general page/svg/line.svg" alt=""></p>
                  <h3>Играть можно в браузере</h3>
               </div>
               <h2>Запускайте на любых устройствах</h2>
               <span>Наш модуль доступен на все популярные ОС
                  и работает на всех компьютерах.</span><br><br><br><br><br><br><br><br>
               <a href="">Открыть в браузере</a>
            </div>
            <div class="level__pic">
               <img src="asset/img/general page/moto.png" alt="">
            </div>
         </div>

      </div>
   </div>
   <div class="fivelevel">
      <div class="wrapper">
         <div class="level__five">
            <div class="level__five_text">
               <img src="asset/img/general page/svg/line.svg" alt="">
               <p>Игровые сервера на карте</p>
            </div>
            <p>Карта локаций</p>
            <img src="asset/img/general page/russia.png" alt="">
         </div>
      </div>
   </div>
   <footer>
      <div class="wrapper">
         <div class="footer">
            <img src="asset/img/general page/marker 2.png" alt="">
            <h2>WARPLAY.CLOUD</h2>
            <p>2022. All rights reserved.</p>
            <span>Design by desart</span>
            <img src="asset/img/general page/svg/Vector.svg" alt="">
            <p>Политика конфиденциальности</p>
            <p>Файлы Coocie</p>
            <img src="asset/img/general page/svg/VK com.svg" alt="">
            <img src="asset/img/general page/svg/YouTube.svg" alt="">
            <img src="asset/img/general page/svg/Discord.svg" alt="">
         </div>
      </div>
   </footer>


</body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
<script src="asset/js/script.js"></script>

</html>