<?php
include_once './shared/head.php';


auth(2,3,4);

$select="SELECT * FROM `properties`";
$s=mysqli_query($connect,$select);

if(isset($_GET['delete'])){
  $id=$_GET['delete'];
  $select="SELECT * FROM `properties` WHERE id=$id";
  $s=mysqli_query($connect,$select);
  foreach($s as $list){
    $image=$list['image'];
    unlink("./app/properties/upload/$image");
  }
  $query="DELETE  FROM `properties` WHERE id=$id";
  $del=mysqli_query($connect,$query);

  header('Location: ' . baseurl(''));

  }

?>

<body>
<?php 
include_once './shared/header.php';
include_once './shared/aside.php';
?>

  <main id="main" class="main">

<div class="pagetitle">
  <?php if($_SESSION['auth']['rule']==1 || $_SESSION['auth']['rule']==2 || $_SESSION['auth']['rule']==4):?>
  <h4><a class="float-end text-primary" href="<?=baseurl("app/properties/create.php")?>">Create Property</a></h4>
  <?php endif;?>
  <h1>Properties</h1>

  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=baseurl()?>">Home</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row align-items-top">
    <?php foreach($s as $item): ?>
      <div class="col-lg-3">
        <!-- Card with an image on top -->
        <div class="card">
          <img height="150" src="<?=baseurl("app/properties/upload/").$item['image']?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?=$item['title']?></h5>
            <p class="card-text"><?=$item['description']?></p>
            <h5 class="card-title"><?=$item['price']?></h5>
            <?php if($_SESSION['auth']['rule']==1 || $_SESSION['auth']['rule']==2 || $_SESSION['auth']['rule']==4):?>
            <a class="btn btn-info" href="./app/properties/edit.php?edit=<?=$item['id']?>">Edit</a>
            <a class="btn btn-danger" href="./index.php?delete=<?=$item['id']?>">Delete</a>
            <?php else:?>
            <a class="btn btn-info" href="./app/orders/create.php?create=<?=$item['id']?>">Buy Now</a>

          <?php endif;?>
          </div>
        </div><!-- End Card with an image on top -->
      </div>
    <?php endforeach; ?>
  </div>
</section>


</main><!-- End #main -->
  <!-- End #main -->

<?php
include_once './shared/footer.php';
include_once './shared/script.php';
?>

</body>

</html>