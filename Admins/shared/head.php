<?php
include_once 'C:\xampp\htdocs\NiceAdmin\Admins\vendor/functions.php';
include_once 'C:\xampp\htdocs\NiceAdmin\Admins\vendor/env.php';
session_set_cookie_params([
    'path' => 'C:\xampp\htdocs\NiceAdmin\Admins',
]);



session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard-EstateAgency</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href=<?=baseurl('assets/img/logo1.png')?> rel="icon">
  <link href=<?=baseurl('assets/img/apple-touch-icon.png')?> rel="apple-touch-icon">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href=<?=baseurl('assets/vendor/bootstrap/css/bootstrap.min.css')?> rel="stylesheet">
  <link href=<?=baseurl('assets/vendor/bootstrap-icons/bootstrap-icons.css')?> rel="stylesheet">
  <link href=<?=baseurl('assets/vendor/boxicons/css/boxicons.min.css')?> rel="stylesheet">
  <link href=<?=baseurl('assets/vendor/quill/quill.snow.css')?> rel="stylesheet">
  <link href=<?=baseurl('assets/vendor/quill/quill.bubble.css')?>rel="stylesheet">
  <link href=<?=baseurl('assets/vendor/remixicon/remixicon.css')?> rel="stylesheet">
  <link href=<?=baseurl('assets/vendor/simple-datatables/style.css')?>rel="stylesheet">

  <link href=<?=baseurl('assets/css/style.css')?> rel="stylesheet">

</head>