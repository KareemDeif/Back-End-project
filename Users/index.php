<?php
include_once './shared/head.php';

$select="SELECT * FROM `agents`";
$s=mysqli_query($connect,$select);
$delay=0;

$select2="SELECT * FROM `properties`";
$s2=mysqli_query($connect,$select2);
$data=mysqli_fetch_assoc($s2);
$id=$data['id'];
$count=$id+2;

$select3="SELECT * FROM properties WHERE id<=$count";
$query=mysqli_query($connect,$select3);


?>

<body class="index-page">

<?php

include_once './shared/header.php'

?>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
      <?php foreach($query as $item):?>
        <?php if($item['id']==$id):?>
          <div class="carousel-item active">
          <img src="<?= "../Admins/app/properties/upload/".$item['image']?>" alt="">
          <div class="carousel-container">
            <div>
              <p></p>
              <h2><?=$item['title']?></h2>
              <a href="<?=baseurl('property-single.php?id=').$item['id']?>" class="btn-get-started">rent | $ <?=$item['price']?></a>
            </div>
          </div>
        </div><!-- End Carousel Item -->
        <?php else:?>
          <div class="carousel-item">
          <img src="<?= "../Admins/app/properties/upload/".$item['image']?>" alt="">
          <div class="carousel-container">
            <div>
              <p></p>
              <h2><?=$item['title']?></h2>
              <a href="<?=baseurl('property-single.php?id=').$item['id']?>" class="btn-get-started">rent | $ <?=$item['price']?></a>
            </div>
          </div>
        </div><!-- End Carousel Item -->
          <?php endif?>
      <?php endforeach?>

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

      </div>

    </section><!-- /Hero Section -->

    <!-- Agents Section -->
    <section id="agents" class="agents section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Agents</h2>
      </div><!-- End Section Title -->

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

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Clients Opinions</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                Selling my home was a breeze thanks to this real estate firm. They were extremely professional, always available for questions, and kept me updated on every development. I felt like I was in good hands from start to finish. The team went above and beyond to get me the best price.                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>Ceo &amp; Founder</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                I recently purchased a home through this real estate company, and I couldn’t be happier. The agents were knowledgeable, patient, and guided me through every step. They really listened to what I wanted and helped me find my dream home. The process was smooth and stress-free. Highly recommend!                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                As a first-time buyer, I was nervous about the process, but this company made everything simple and clear. Their attention to detail and market insights were spot-on. They found the perfect property for me and handled the negotiations brilliantly. A wonderful experience overall!                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Store Owner</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                I’ve dealt with several real estate companies before, but this one stands out for its exceptional service. They were responsive, transparent, and truly cared about finding the best property for my needs. The whole process was efficient, and I couldn’t have asked for better assistance!                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>Matt Brandon</h3>
                  <h4>Freelancer</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                Working with this real estate company was a fantastic experience. The agents were professional and always willing to go the extra mile to accommodate my requests. They made sure I was comfortable every step of the way and provided excellent advice. I’m thrilled with the outcome and highly recommend them                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>John Larson</h3>
                  <h4>Entrepreneur</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

  </main>

  <?php
include_once './shared/footer.php';
include_once './shared/script.php';

?>

</body>

</html>