<?php
include_once './shared/head.php';
$message;
$error;

if(isset($_GET['id'])){
$id=$_GET['id'];

$select="SELECT * FROM `property_agent` WHERE id=$id";
$s=mysqli_query($connect,$select);
$prop_data=mysqli_fetch_assoc($s);

if(isset($_POST['rent'])){
$amount=1;
 if(empty($_SESSION['user'])){
  $error="Your Order wasn't sent ,You Must Make Account First";

 }else{
  $user_id=$_COOKIE['user_cookie'];
  $property_id=$id;
  $insert="INSERT INTO `orders`(`id`, `amount`, `user_id`, `property_id`, `create_at`) VALUES (NULL,'$amount','$user_id','$property_id',DEFAULT)";
  $i=mysqli_query($connect,$insert);
  if($i){
    $message="Your Order has been sent successfully";
  }
 }


}


}



?>


<body class="property-single-page">

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
              <h1>Property Data</h1>
              <p class="mb-0">Discover your dream home with us! Explore a wide range of properties that suit every lifestyle and budget. Whether you're buying, selling, or renting, our expert team is here to guide you through every step. Start your journey today!</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="<?=baseurl()?>">Home</a></li>
            <li class="current">Property Single</li>
          </ol>
        </div>
      </nav>
      <?php if(!empty($message)):?>
            <div class="alert alert-success">
              <?=$message?>
            </div>
            <?php elseif(!empty($error)):?>
            <div class="alert alert-danger">
              <?=$error?>
            </div>
            <?php endif ?>
    </div><!-- End Page Title -->

    <!-- Real Estate 2 Section -->
    <section id="real-estate-2" class="real-estate-2 section">

      <div class="container" data-aos="fade-up">

        <div class="portfolio-details-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              },
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">

            <div class="swiper-slide">
              <img height="500px" src="<?= "../Admins/app/properties/upload/".$prop_data['property_image']?>" alt="">
            </div>

            <div class="swiper-slide">
              <img height="500px" src="<?= "../Admins/app/properties/upload/".$prop_data['property_image']?>" alt="">
            </div>

            <div class="swiper-slide">
              <img height="500px" src="<?= "../Admins/app/properties/upload/".$prop_data['property_image']?>" alt="">
            </div>

          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-pagination"></div>
        </div>

        <div class="row justify-content-between gy-4 mt-4">

          <div class="col-lg-8" data-aos="fade-up">

            <div class="portfolio-description">
              <h2>Property Details:</h2>
              <p>
                <?=$prop_data['property_description']?>
              </p>
              <h2 class="float-end"><?="Price=".$prop_data['price']."$"?></h2>



              <div class="testimonial-item">
                <p>
<h2>Agent</h2>                </p>
                <div>
                  <img src="../Admins/app/agents/upload/<?=$prop_data['agent_image']?>" class="testimonial-img" alt="">
                  <h3><?=$prop_data['agent_name']?></h3>
                  <h4><?=$prop_data['agent_email']?></h4>
                </div>
              </div>
              <form method="post">
              <button class="btn btn-success" name="rent">Rent Now</button>
              </form>
            </div><!-- End Portfolio Description -->

            <!-- Tabs -->
            <ul class="nav nav-pills mb-3">
              <li><a class="nav-link active" data-bs-toggle="pill" href="#real-estate-2-tab1">Video</a></li>
              <li><a class="nav-link" data-bs-toggle="pill" href="#real-estate-2-tab2">Floor Plans</a></li>
              <li><a class="nav-link" data-bs-toggle="pill" href="#real-estate-2-tab3">Location</a></li>
            </ul><!-- End Tabs -->

            <!-- Tab Content -->
            <div class="tab-content">

              <div class="tab-pane fade show active" id="real-estate-2-tab1">

              </div><!-- End Tab 1 Content -->

              <div class="tab-pane fade" id="real-estate-2-tab2">
                <img src="assets/img/floor-plan.jpg" alt="" class="img-fluid">
              </div><!-- End Tab 2 Content -->

              <div class="tab-pane fade" id="real-estate-2-tab3">
                <iframe style="border:0; width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div><!-- End Tab 3 Content -->

            </div><!-- End Tab Content -->

          </div>

          <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="portfolio-info">
              <h3>Quick Summary</h3>
              <ul>
                <li><strong>Property ID:</strong> 1134n</li>
                <li><strong>Location:</strong> Chicago, IL 606543</li>
                <li><strong>Property Type:</strong> House</li>
                <li><strong>Status:</strong> Sale</li>
                <li><strong>Area:</strong> <span>340m <sup>2</sup></span></li>
                <li><strong>Beds:</strong> 4</li>
                <li><strong>Baths:</strong> 1</li>
              </ul>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Real Estate 2 Section -->

  </main>

  <?php
include_once './shared/footer.php';
include_once './shared/script.php';

?>

</body>

</html>