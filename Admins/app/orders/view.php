<?php
include_once '../../shared/head.php';

auth(2);

if(isset($_GET['view'])){
  $id=$_GET['view'];
  $select="SELECT * FROM `order_all` where id=$id";
  $s=mysqli_query($connect,$select);
  $data=mysqli_fetch_assoc($s);

}


?>



<body>
<?php 
include_once '../../shared/header.php';
include_once '../../shared/aside.php';
?>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Order Data</h1>
  <nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=baseurl()?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?=baseurl('app/orders/')?>">Orders</a></li>
      <li class="breadcrumb-item"><a href="<?=baseurl('app/orders/view.php')?>">View Order</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->



<section class="section ">
      <div class="row align-items-top">
        <div class="col-lg-8">







<div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                  <img src="<?= baseurl('app/properties/upload/');?><?= $data['property_image']?>" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Order:</h5>
                  <div class="row my-2">
                <div class="col-lg-4 col-md-4 label ">Name</div>
                <div class="col-lg-8 col-md-8"><?= $data['client_name']?></div>
                </div>
                <div class="row my-2">
                <div class="col-lg-4 col-md-4 label ">Email</div>
                <div class="col-lg-8 col-md-8"><?= $data['client_email']?></div>
                </div>
                <div class="row my-2">
                <div class="col-lg-4 col-md-4 label ">Property Title</div>
                <div class="col-lg-8 col-md-8"><?= $data['property_title']?></div>
                </div>
                <div class="row my-2">
                <div class="col-lg-4 col-md-4 label ">Property Price</div>
                <div class="col-lg-8 col-md-8"><?= $data['property_price']?></div>
                </div>

                  <a class="btn btn-primary my-2" href="./index.php">Go Back</a>
                </div>
              </div>
            </div>
          </div><!-- End Card with an image on left -->


</div>

</div>
</section>

</main><!-- End #main -->

<?php
include_once '../../shared/footer.php';
include_once '../../shared/script.php';
?>

</body>

</html>