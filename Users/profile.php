<?php
include_once './vendor/env.php';

include_once './shared/head.php';
$errors=[];
$message;
if(isset($_POST['update'])){
  $user_id=$_SESSION['user']['id'];
  $name=$_POST['name'];
  $email=$_POST['email'];

  if(empty($_FILES['image']['name'])){
$image=$_SESSION['user']['image'];
  }else{
    $oldimage=$_SESSION['user']['image'];
    if($_SESSION['user']['image']!='user.jpg'){
      unlink("../Admins/app/users/upload/$oldimage");
    }
    $image= rand(0,1000) . $_FILES['image']['name'];
    $tmpname=$_FILES['image']['tmp_name'];

  }


  $location="../Admins/app/users/upload/$image";
  move_uploaded_file($tmpname,$location);
  $query="UPDATE `users` SET `name`='$name',`email`='$email',`image`='$image' WHERE id=$user_id";
$u=mysqli_query($connect,$query);
$_SESSION['user']['name']=$name;
$_SESSION['user']['email']=$email;
$_SESSION['user']['image']=$image;
}

if(isset($_POST['changepass'])){
  $userid=$_SESSION['user']['id'];

$current=$_POST['password'];
$hash_current=sha1($current);
$select="SELECT * FROM users WHERE id=$userid";
$s=mysqli_query($connect,$select);
$data=mysqli_fetch_assoc($s);

if($hash_current==$data['password']){
  $userid=$_SESSION['user']['id'];
$newpass=$_POST['newpassword'];
$renew=$_POST['renewpassword'];
if($newpass==$renew){
$hash_new=sha1($renew);
$update="UPDATE `users` SET `password`='$hash_new' WHERE id=$userid";
$u=mysqli_query($connect,$update);
$message="Your Password has been changed successfully";
}else{
  $errors[]="The Confirmation Password is Wrong";
}
}else{
  $errors[]="Your Current Password is Wrong";

}
}



?>


<body>
  <?php
  include_once './shared/header.php'
  ?>





<main id="main" class="main mt-5">

<section class="section profile">
<?php if(!empty($errors)):?>
  <div class="alert alert-danger">
      <ul>
      <?php foreach($errors as $error):?>
      <li><?=$error;?></li>
    <?php endforeach?>
    </ul>
</div>
<?php endif?>
<?php if(!empty($message)):?>
  <div class="alert alert-success">
      <ul>
      <li><?=$message;?></li>
    </ul>
</div>
<?php endif;?>
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
        <?php if(empty($_SESSION['user']['image'])):?>
          <img src="../Admins/shared/user.jpg" height="200px"  alt="Profile" class="circle">
          <?php else:?>
            <img src="../Admins/app/users/upload/<?=$_SESSION['user']['image']?>" height="200px"  alt="Profile" class="circle">
            <?php endif?>
            <?php if(empty($_SESSION['user']['name'])):?>
                  <h2>Your Name</h2>
          <?php else:?>
            <h2><?= $_SESSION['user']['name']?></h2>
            <?php endif?>
          <div class="social-links mt-2">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>
            <?php if(!empty($_SESSION['user'])):?>
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>
            <?php endif?>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">

              <h5 class="card-title">Profile Details</h5>

              <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label ">Name</div>
                <?php if(empty($_SESSION['user']['name'])):?>
                  <div class="col-lg-9 col-md-8">Your Name</div>
                  <?php else:?>
            <div class="col-lg-9 col-md-8"><?= $_SESSION['user']['name']?></div>
            <?php endif?>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label mt-3">Email</div>
                <?php if(empty($_SESSION['user']['name'])):?>
                  <div class="col-lg-9 col-md-8 mt-3">Your Email</div>
                  <?php else:?>
            <div class="col-lg-9 col-md-8 mt-3"><?= $_SESSION['user']['email']?></div>
            <?php endif?>
              </div>

            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">
            <img src="../Admins/app/users/upload/<?=$_SESSION['user']['image']?>" height="200px" alt="Profile" >
                    <div class="pt-2">
                      <input type="file" name="image" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="name" type="text" class="form-control" id="fullName" value="<?=$_SESSION['user']['name']?>">
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="Email" value="<?= $_SESSION['user']['email']?>">
                  </div>
                </div>


                <div class="text-center">
                  <button type="submit" name="update" class="btn btn-success">Save Changes</button>
                </div>
              </form><!-- End Profile Edit Form -->

            </div>



            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form method="post">

                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="currentPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="newpassword" type="password" class="form-control" id="newPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" name="changepass" class="btn btn-success">Change Password</button>
                </div>
              </form><!-- End Change Password Form -->

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->

<?php
include_once './shared/script.php'
?>
</body>
</html>