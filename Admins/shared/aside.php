<?php
include_once 'C:\xampp\htdocs\NiceAdmin\Admins\vendor/functions.php';
include_once 'C:\xampp\htdocs\NiceAdmin\Admins\vendor/env.php';

// session_start();
?>



<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
<?php if($_SESSION['auth']['rule']==1 || $_SESSION['auth']['rule']==2 || $_SESSION['auth']['rule']==4 ):?>
  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= baseurl()?>">
      <i class="bi bi-grid"></i>
      <span>Home</span>
    </a>
  </li><!-- End Dashboard Nav -->

  
  <li class="nav-item">
        <a class="nav-link collapsed"  href="<?= baseurl('app/admins/')?>">
          <i class="bi bi-menu-button-wide"></i><span>Admins</span>
        </a>
  </li>

  <li class="nav-item">
        <a class="nav-link collapsed"  href="<?= baseurl('app/agents/')?>">
          <i class="bi bi-journal-text"></i><span>Agents</span>
        </a>
          <li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= baseurl('app/users/') ?>">
      <i class="bi bi-person"> </i>
      <span>Clients</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
        <a class="nav-link collapsed" href="<?= baseurl('app/orders/') ?>">
          <i class="bi bi-layout-text-window-reverse"></i><span>Orders</span>
        </a>
          <li>

          <li class="nav-item">
    <a class="nav-link collapsed" href="<?= baseurl('app/admins/messages.php') ?>">
      <i class="bi bi-envelope"></i>
      <span>Messages</span>
    </a>
  </li><!-- End Contact Page Nav -->
          
<?php else:?>
  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= baseurl()?>">
      <i class="bi bi-grid"></i>
      <span>Home</span>
    </a>
  </li><!-- End Dashboard Nav -->
<?php endif;?>
  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= baseurl('profile.php') ?>">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->





  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= baseurl('login.php') ?>">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Login</span>
    </a>
  </li><!-- End Login Page Nav -->

</ul>

</aside><!-- End Sidebar-->