<?php
include_once './shared/head.php';

$errors;
if (isset($_POST['login'])){
$email=$_POST['email'];
$password=$_POST['password'];
$hash_password=sha1($password);
$select="SELECT * FROM admins WHERE `email`='$email' and `password`='$hash_password'";
$s=mysqli_query($connect,$select);
$userdata=mysqli_fetch_assoc($s);
$numrows=mysqli_num_rows($s);
if($numrows==1){
  setcookie("auth_user",$userdata['id'],time()+60*60*2,'C:\xampp\htdocs\NiceAdmin\Admins');
  $_SESSION['auth']=[
    "id"=>$userdata['id'],
    "name"=>$userdata['name'],
    "email"=>$userdata['email'],
    "image"=>$userdata['image'],
    "rule"=>$userdata['rule']
  ];
  header('Location: ' . baseurl());

}elseif($numrows==0){
  $select="SELECT * FROM users WHERE `email`='$email' and `password`='$hash_password'";
$s=mysqli_query($connect,$select);
$userdata=mysqli_fetch_assoc($s);
$userrows=mysqli_num_rows($s);
if($userrows==1){
  setcookie("auth_user",$userdata['id'],time()+60*60*2,'C:\xampp\htdocs\NiceAdmin\Admins');
$_SESSION['auth']=[
  "id"=>$userdata['id'],
  "name"=>$userdata['name'],
  "email"=>$userdata['email'],
  "image"=>$userdata['image'],
  "rule"=>$userdata['rule_id']
];
header('Location: ' . baseurl());
}
if($userrows==0){
  $select="SELECT * FROM agents WHERE `email`='$email' and `password`='$hash_password'";
$s=mysqli_query($connect,$select);
$userdata=mysqli_fetch_assoc($s);
$agentrows=mysqli_num_rows($s);
if($agentrows==1){
  setcookie("auth_user",$userdata['id'],time()+60*60*2,'C:\xampp\htdocs\NiceAdmin\Admins');
  $_SESSION['auth']=[
    "id"=>$userdata['id'],
    "name"=>$userdata['name'],
    "email"=>$userdata['email'],
    "image"=>$userdata['image'],
    "rule"=>$userdata['rule_id']
  ];
  header('Location: ' . baseurl());
  }
}

if($agentrows==0){
  $errors= "Wrong Password or Email";
  }



}

}

if(isset($_GET['logout'])){
  unset($_SESSION['auth']);
setcookie("auth_user",$userdata['id'],time()-60*60*2,'C:\xampp\htdocs\NiceAdmin\Admins');

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
                  <img src="assets/img/logo2.png" alt="">
                  <span class="d-none d-lg-block">EstateAgency</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                  <?php if(!empty($errors)):?>
                    <div class="alert alert-danger">
                      <ul>
                        <li><?=$errors;?></li>
                      </ul>
                    </div>
                  <?php endif?>
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
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
                      <button name="login" class="btn btn-primary w-100" type="submit">Login</button>
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