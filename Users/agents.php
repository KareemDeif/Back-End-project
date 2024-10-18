<?php
include_once './shared/head.php';

$select="SELECT * FROM agents";
$s=mysqli_query($connect,$select);
?>


<body class="agents-page">

<?php

include_once './shared/header.php'

?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Agents</h1>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="<?=baseurl()?>">Home</a></li>
            <li class="current">Agents</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Agents Section -->
    <section id="agents" class="agents section">

    <div class="container">

<div class="row gy-5">
<?php foreach($s as $item):?>
  <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?=$delay+=100;?>">
    <div class="member">
      <?php if($item['image']=="user.jpg"):?>
      <div class="pic"><img src="<?= "../Admins/shared/".$item['image']?>" class="img-fluid" alt=""></div>
      <?php else:?>
        <div class="pic"><img src="<?= "../Admins/app/agents/upload/".$item['image']?>" class="img-fluid" alt=""></div>
      <?php endif?>
      <div class="member-info">
        <h4><?=$item['name']?></h4>
        <span><?=$item['email']?></span>
        <div class="social">
          <a href=""><i class="bi bi-twitter-x"></i></a>
          <a href=""><i class="bi bi-facebook"></i></a>
          <a href=""><i class="bi bi-instagram"></i></a>
          <a href=""><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div>
  </div><!-- End Team Member -->
<?php endforeach?>

</div>

</div>

    </section><!-- /Agents Section -->

  </main>

  <?php
include_once './shared/footer.php';
include_once './shared/script.php';

?>

</body>

</html>