<?php
include_once './shared/head.php';

$select="SELECT * FROM `properties`";
$s=mysqli_query($connect,$select);

$delay=0;
?>


<body class="properties-page">

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
              <h1>Properties</h1>
              <p class="mb-0">Discover your dream home with us! Explore a wide range of properties that suit every lifestyle and budget. Whether you're buying, selling, or renting, our expert team is here to guide you through every step. Start your journey today!</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="<?= baseurl() ?>">Home</a></li>
            <li class="current">Properties</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Real Estate Section -->
    <section id="real-estate" class="real-estate section">

      <div class="container">

        <div class="row gy-4">
          <?php foreach($s as $item):?>
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="<?=$delay+=100;?>">
            <div class="card">
              <img src="<?= "../Admins/app/properties/upload/".$item['image']?>" alt="" class="img-fluid">
              <div class="card-body">
                <span class="sale-rent">Rent | $ <?=$item['price']?></span>
                <h3><a href="<?= baseurl('property-single.php?id=').$item['id']?>" class="stretched-link"><?=$item['title']?></a></h3>
                <div class="card-content d-flex flex-column justify-content-center text-center">
                  <div class="row propery-info">
                    <div class="col">Area</div>
                    <div class="col">Beds</div>
                    <div class="col">Baths</div>
                    <div class="col">Garages</div>
                  </div>
                  <div class="row">
                    <div class="col">340m2</div>
                    <div class="col">5</div>
                    <div class="col">2</div>
                    <div class="col">1</div>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Property Item -->
       <?php endforeach;?>


        </div>

      </div>

    </section><!-- /Real Estate Section -->

  </main>

  <?php
include_once './shared/footer.php';
include_once './shared/script.php';

?>
</body>

</html>