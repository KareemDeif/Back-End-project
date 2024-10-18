<?php
include_once 'C:\xampp\htdocs\NiceAdmin\Users\vendor/env.php';
include_once 'C:\xampp\htdocs\NiceAdmin\Users\vendor/functions.php';
session_set_cookie_params([
  'path' => 'C:\xampp\htdocs\NiceAdmin\Users',
]);
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>EstateAgency</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link href="<?=baseurl('assets/img/logo1.png') ?>" rel="icon">
  <link href="<?= baseurl('assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link href="<?= baseurl('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= baseurl('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= baseurl('assets/vendor/aos/aos.css') ?>" rel="stylesheet">
  <link href="<?= baseurl('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
  <link href="<?= baseurl('assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

  <link href="<?= baseurl('assets/css/main.css') ?>" rel="stylesheet">

</head>
