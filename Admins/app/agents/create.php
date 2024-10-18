<?php
include_once '../../shared/head.php';
auth(2);
$errors = [];

if(isset($_POST['submit'])){
$id=$_COOKIE['auth_user'];
$name=FilterValidation($_POST['name']);
$email=FilterValidation($_POST['email']);
$password=$_POST['password'];
$hash_password=sha1($password);
$phone=$_POST['phone'];

$image='user.jpg';




if(empty($name)){
$errors[]="Please Enter Name";
}
if($numrows>0){
  $errors[]="This Email is already existed";
}

if(empty($errors)){
  $insert="INSERT INTO `agents` VALUES (null,'$name','$email','$hash_password','$image','$phone',DEFAULT)";
  $i=mysqli_query($connect,$insert);
  header('Location: ' . baseurl('app/agents/'));
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
  <h1>Create Agent</h1>
  <nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=baseurl()?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?=baseurl('app/agents/')?>">Agents</a></li>
      <li class="breadcrumb-item"><a href="<?=baseurl('app/agents/create.php')?>">Create Agent</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section container">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Create Agent <a class="float-end text-primary" href="./index.php">Go Back</a></h5>
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
              <label for="inputEmail3" class="col-sm-2 col-form-label">Agent Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="inputText">
              </div>
            </div>
            <div class="row mb-4">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Agent Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="inputEmail">
              </div>
            </div>
            <div class="row mb-4">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Agent Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="password" id="inputPassword">
              </div>
            </div>

            <div class="row mb-4">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Agent Phone</label>
              <div class="col-sm-10">
                <input type="phone" class="form-control" name="phone">
              </div>
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