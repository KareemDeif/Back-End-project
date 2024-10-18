<?php
include_once './shared/head.php';

$errors;

if (isset($_POST['login'])){
$email=$_POST['email'];
$password=$_POST['password'];
$hash_password=sha1($password);
$select="SELECT * FROM users WHERE `email`='$email' and `password`='$hash_password'";
$s=mysqli_query($connect,$select);
$userdata=mysqli_fetch_assoc($s);
$numrows=mysqli_num_rows($s);
if($numrows==1){
  setcookie("user_cookie",$userdata['id'],time()+60*60*3,'C:\xampp\htdocs\NiceAdmin\Users');
  $_SESSION['user']=[
    "id"=>$userdata['id'],
    "name"=>$userdata['name'],
    "email"=>$userdata['email'],
    "image"=>$userdata['image'],
    "rule"=>$userdata['rule']
  ];
  header('Location: ' . baseurl());

}else{
  $errors="Wrong Email or Password";
}
}



if(isset($_GET['signout'])){
  unset($_SESSION['user']);
setcookie("user_cookie",$userdata['id'],time()-60*60*2,'C:\xampp\htdocs\NiceAdmin\Users');

header('Location: ' . baseurl('login.php'));
}



?>











<body>



<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="<?=baseurl()?>" class="logo d-flex align-items-center w-auto">
                <h1 class="sitename">Estate<span class="text-success">Agency</span></h1>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">
                <?php if(!empty($errors)):?>
                <div class="alert alert-danger">
                  <?=$errors;?>
                </div>
                <?php endif?>

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4 text-success">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" method="post">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button name="login" class="btn btn-success w-100" type="submit">Login</button>
                      <a class="btn text-success w-100 mt-3" href="<?=baseurl()?>">Back Home</a>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="<?= baseurl('register.php') ?>">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <?php
include_once './shared/script.php';
?>
</body>
</html>