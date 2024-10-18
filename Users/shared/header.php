<?php
include_once 'C:\xampp\htdocs\NiceAdmin\Users\vendor/functions.php';


?>


<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="<?= baseurl() ?>" class="logo d-flex align-items-center">
        <img src="<?= baseurl('assets/img/logo1.png')?>" alt="">
        <h1 class="sitename">Estate<span>Agency</span></h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?= baseurl() ?>">Home</a></li>
          <li><a href="<?= baseurl('properties.php') ?>">Properties</a></li>
          <li><a href="<?= baseurl('agents.php') ?>">Agents</a></li>
          <li><a href="<?= baseurl('contact.php') ?>">Contact</a></li>
          <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
            <li><a href="<?= baseurl('login.php') ?>">Login</a></li>
            <li><a href="<?= baseurl('register.php') ?>" >Register</a></li>
            <li><a href="<?= baseurl('profile.php') ?>" >My Profile</a></li>
            <?php if(!empty($_SESSION['user'])):?>
            <li><a href="<?= baseurl('login.php?signout=true') ?>">Logout</a></li>
            <?php endif; ?>
            </ul>
          </li>


        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>