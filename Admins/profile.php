<?php
include_once './shared/head.php';
auth(2,3,4);
$errors=[];
$message;
if(isset($_POST['update'])){
  $user_id=$_SESSION['auth']['id'];
  $name=$_POST['name'];
  $email=$_POST['email'];

  if(empty($_FILES['image']['name'])){
$image=$_SESSION['auth']['image'];
  }else{
    $oldimage=$_SESSION['auth']['image'];
    if($_SESSION['auth']['image']!='user.jpg'){
      if($_SESSION['auth']['rule']==1 || $_SESSION['auth']['rule']==2){
        unlink("./app/admins/upload/$oldimage");
      }
      if($_SESSION['auth']['rule']==3){
        unlink("./app/users/upload/$oldimage");
      }
      if($_SESSION['auth']['rule']==4){
        unlink("./app/agents/upload/$oldimage");
      }
    }
    $image= rand(0,1000) . $_FILES['image']['name'];
    $tmpname=$_FILES['image']['tmp_name'];

  }

if($_SESSION['auth']['rule']==1 || $_SESSION['auth']['rule']==2){
  $location="./app/admins/upload/$image";
  move_uploaded_file($tmpname,$location);
  $query="UPDATE `admins` SET `name`='$name',`email`='$email',`image`='$image' WHERE id=$user_id";
$u=mysqli_query($connect,$query);
$_SESSION['auth']['name']=$name;
$_SESSION['auth']['email']=$email;
$_SESSION['auth']['image']=$image;

}elseif($_SESSION['auth']['rule']==3){
  $location="./app/users/upload/$image";
  move_uploaded_file($tmpname,$location);
  $query="UPDATE `users` SET `name`='$name',`email`='$email',`image`='$image' WHERE id=$user_id";
$u=mysqli_query($connect,$query);
$_SESSION['auth']['name']=$name;
$_SESSION['auth']['email']=$email;
$_SESSION['auth']['image']=$image;
}

elseif($_SESSION['auth']['rule']==4){
  $location="./app/agents/upload/$image";
  move_uploaded_file($tmpname,$location);
  $query="UPDATE `agents` SET `name`='$name',`email`='$email',`image`='$image' WHERE id=$user_id";
$u=mysqli_query($connect,$query);
$_SESSION['auth']['name']=$name;
$_SESSION['auth']['email']=$email;
$_SESSION['auth']['image']=$image;
}


}


if(isset($_POST['changepass'])){
  $userid=$_SESSION['auth']['id'];

$current=$_POST['password'];
$hash_current=sha1($current);
if($_SESSION['auth']['rule']==1 || $_SESSION['auth']['rule']==2){
  $select="SELECT * FROM admins WHERE id=$userid";
  $s=mysqli_query($connect,$select);
  $data=mysqli_fetch_assoc($s);
  if($hash_current==$data['password']){
    $userid=$_SESSION['auth']['id'];
  $newpass=$_POST['newpassword'];
  $renew=$_POST['renewpassword'];
  if($newpass==$renew){
  $hash_new=sha1($renew);
  $update="UPDATE `admins` SET `password`='$hash_new' WHERE id=$userid";
  $u=mysqli_query($connect,$update);
  $message="Your Password has been changed successfully";
  }else{
    $errors[]="The Confirmation Password is Wrong";
  }
  }else{
    $errors[]="Your Current Password is Wrong";
  
  }
}






if($_SESSION['auth']['rule']==3){
  $select="SELECT * FROM users WHERE id=$userid";
  $s=mysqli_query($connect,$select);
  $data=mysqli_fetch_assoc($s);
  if($hash_current==$data['password']){
    $userid=$_SESSION['auth']['id'];
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







if($_SESSION['auth']['rule']==4){
  $select="SELECT * FROM agents WHERE id=$userid";
  $s=mysqli_query($connect,$select);
  $data=mysqli_fetch_assoc($s);
  if($hash_current==$data['password']){
    $userid=$_SESSION['auth']['id'];
  $newpass=$_POST['newpassword'];
  $renew=$_POST['renewpassword'];
  if($newpass==$renew){
  $hash_new=sha1($renew);
  $update="UPDATE `agents` SET `password`='$hash_new' WHERE id=$userid";
  $u=mysqli_query($connect,$update);
  $message="Your Password has been changed successfully";
  }else{
    $errors[]="The Confirmation Password is Wrong";
  }
  }else{
    $errors[]="Your Current Password is Wrong";
  
  }
}




}



?>

<body>
<?php 
include_once './shared/header.php';
include_once './shared/aside.php';
?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= baseurl()?>">Home</a></li>
      <li class="breadcrumb-item active"><a href="<?= baseurl('profile.php')?>">Profile</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->

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
  <div class="alert alert-success" role="alert">
      <?=$message?>
  </div>
<?php endif;?>
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
        <?php if($_SESSION['auth']['image']=='user.jpg'):?>
        <img src="<?= baseurl('shared/'); ?><?= $_SESSION['auth']['image']?>" alt="Profile" class="circle">
        <?php elseif($_SESSION['auth']['rule']==1 || $_SESSION['auth']['rule']==2):?>
          <img src="<?= baseurl('app/admins/upload/'); ?><?= $_SESSION['auth']['image']?>" alt="Profile" class="circle">
          <?php elseif($_SESSION['auth']['rule']==3):?>
            <img src="<?= baseurl('app/users/upload/'); ?><?= $_SESSION['auth']['image']?>" alt="Profile" class="circle">
            <?php elseif($_SESSION['auth']['rule']==4):?>
              <img src="<?= baseurl('app/agents/upload/'); ?><?= $_SESSION['auth']['image']?>" alt="Profile" class="circle">
          <?php endif?>
          <h2><?= $_SESSION['auth']['name']?></h2>
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

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <h5 class="card-title">About</h5>
              <p class="small fst-italic">Success is not about speed, but about the strength to keep going, even when the road gets tough.</p>

              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                <div class="col-lg-9 col-md-8"><?= $_SESSION['auth']['name']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8"><?= $_SESSION['auth']['email']?></div>
              </div>

            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">
                  <?php if($_SESSION['auth']['image']=='user.jpg'):?>
        <img src="<?= baseurl('shared/'); ?><?= $_SESSION['auth']['image']?>" alt="Profile">
        <?php elseif($_SESSION['auth']['rule']==1 || $_SESSION['auth']['rule']==2):?>
          <img src="<?= baseurl('app/admins/upload/'); ?><?= $_SESSION['auth']['image']?>" alt="Profile">
          <?php elseif($_SESSION['auth']['rule']==3):?>
            <img src="<?= baseurl('app/users/upload/'); ?><?= $_SESSION['auth']['image']?>" alt="Profile">
            <?php elseif($_SESSION['auth']['rule']==4):?>
              <img src="<?= baseurl('app/agents/upload/'); ?><?= $_SESSION['auth']['image']?>" alt="Profile">
          <?php endif?>

                    <div class="pt-2">
                      <input type="file" name="image" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="name" type="text" class="form-control" id="fullName" value="<?= $_SESSION['auth']['name']?>">
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="Email" value="<?= $_SESSION['auth']['email']?>">
                  </div>
                </div>


                <div class="text-center">
                  <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End Profile Edit Form -->

            </div>

            <div class="tab-pane fade pt-3" id="profile-settings">

              <!-- Settings Form -->
              <form>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                  <div class="col-md-8 col-lg-9">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="changesMade" checked>
                      <label class="form-check-label" for="changesMade">
                        Changes made to your account
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="newProducts" checked>
                      <label class="form-check-label" for="newProducts">
                        Information on new products and services
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="proOffers">
                      <label class="form-check-label" for="proOffers">
                        Marketing and promo offers
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                      <label class="form-check-label" for="securityNotify">
                        Security alerts
                      </label>
                    </div>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End settings Form -->

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
                  <button type="submit" name="changepass" class="btn btn-primary">Change Password</button>
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
include_once './shared/footer.php';
include_once './shared/script.php';
?>

</body>

</html>