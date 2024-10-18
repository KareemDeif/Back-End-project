<?php
include_once './vendor/env.php';
include_once './shared/head.php';
// auth();
if(isset($_POST['register'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $hashpassword=sha1($password);
  $image= rand(0,1000) . $_FILES['image']['name'];
  $tmpname=$_FILES['image']['tmp_name'];
  $location="../Admins/app/users/upload/$image";
  move_uploaded_file($tmpname,$location);
  $insert="INSERT INTO `users` VALUES (null,'$name','$email','$hashpassword','$image', DEFAULT)";
  $i=mysqli_query($connect,$insert);
  header('Location: ' . baseurl('login.php'));
}


?>

<body>

<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="<?= baseurl()?>" class="logo d-flex align-items-center w-auto">
                <h1 class="sitename">Estate<span class="text-success">Agency</span></h1>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4 text-success">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>


                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Your Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="yourUsername" required>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <label class="form-label">Your Image</label>
                      <input type="file" name="image" class="form-control" required>
                    </div>


                    <div class="col-12">
                      <button class="btn btn-success w-100" name="register" type="submit">Create Account</button>
                      <a class="btn text-success w-100 mt-3" href="<?=baseurl()?>">Back Home</a>

                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="<?= baseurl('login.php')?>">Log in</a></p>
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