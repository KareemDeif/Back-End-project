<?php
include_once '../../shared/head.php';

auth(2);

if(isset($_GET['view'])){
  $id=$_GET['view'];
  $select="SELECT * FROM `admin_data` where id=$id";
  $s=mysqli_query($connect,$select);
  $data=mysqli_fetch_assoc($s);
  $name=$data['name'];

}


?>



<body>
<?php 
include_once '../../shared/header.php';
include_once '../../shared/aside.php';
?>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Admin Data</h1>
  <nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=baseurl()?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?=baseurl('app/admins/')?>">Admins</a></li>
      <li class="breadcrumb-item"><a href="<?=baseurl('app/admins/view.php')?>">View Admin</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->



<section class="section ">
      <div class="row align-items-top">
        <div class="col-lg-8">







<div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
              <?php if($data['image']=='user.jpg'):?>
                <img src="<?= baseurl('shared/'); ?><?= $data['image']?>" class="img-fluid rounded-start" alt="...">
                <?php else:?>
                  <img src="<?= baseurl('app/admins/upload/'); ?><?= $data['image']?>" class="img-fluid rounded-start" alt="...">
                  <?php endif?>

              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $data['name']?></h5>
                  <div class="row my-2">
                <div class="col-lg-4 col-md-4 label ">Full Name</div>
                <div class="col-lg-8 col-md-8"><?= $data['name']?></div>
                </div>
                <div class="row my-2">
                <div class="col-lg-4 col-md-4 label ">Email</div>
                <div class="col-lg-8 col-md-8"><?= $data['email']?></div>
                </div>
                <div class="row my-2">
                <div class="col-lg-4 col-md-4 label ">Rule</div>
                <div class="col-lg-8 col-md-8"><?= $data['rules_name']?></div>
                </div>
                <div class="row my-2">
                <div class="col-lg-4 col-md-4 label ">Description</div>
                <div class="col-lg-8 col-md-8"><?= $data['rules_descriprion']?></div>
                </div>
                <div class="row my-2">
                <div class="col-lg-4 col-md-4 label ">Created_By</div>
                <?php if($data['created_by']==NUll):?>
                <div class="col-lg-8 col-md-8"><span class="badge bg-success"><?='Owner'?></span></div>
                <?php else: ?>
                <div class="col-lg-8 col-md-8"><?=$data['created_by']?></div>
                <?php endif?>                
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