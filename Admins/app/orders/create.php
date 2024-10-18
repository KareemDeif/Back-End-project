<?php
include_once '../../shared/head.php';
auth(3);
$errors = [];
if(isset($_GET['create'])){
$id=$_GET['create'];

}
if(isset($_POST['submit'])){
$user_id=$_COOKIE['auth_user'];
$amount=$_POST['amount'];




if(empty($errors)){
  $insert="INSERT INTO `orders` VALUES (null,'$amount','$user_id','$id',DEFAULT)";
  $i=mysqli_query($connect,$insert);
  header('Location: ' . baseurl(''));
}


}

?>


<body>
<?php 
include_once '../../shared/header.php';
include_once '../../shared/aside.php';
?>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Create Order</h1>
  <nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=baseurl()?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?=baseurl('app/orders/')?>">Orders</a></li>
      <li class="breadcrumb-item"><a href="<?=baseurl('app/orders/create.php')?>">Create Order</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section container">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Create Order <a class="float-end text-primary" href="./index.php">Go Back</a></h5>
            <?php if(!empty($errors)): ?>    
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                  <?php foreach($errors as $error):?>
                  <li><?= $error;?></li>
                  <?php endforeach;?>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php endif;?>
          <!-- Horizontal Form -->
          <form method="post">
            <div class="row mb-4">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Amount</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="amount" id="inputText">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- End Horizontal Form -->

        </div>
      </div>

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