<?php
include_once '../../shared/head.php';
auth(2,null,4);
$errors = [];
$select="SELECT * FROM agents";
$s=mysqli_query($connect,$select);
if(isset($_POST['submit'])){
$id=$_COOKIE['auth_user'];
$title=FilterValidation($_POST['title']);
$description=FilterValidation($_POST['description']);
$price=$_POST['price'];
if($_SESSION['auth']['rule']==1 || $_SESSION['auth']['rule']==2){
  $sales_agent=$_POST['agent_id'];
}else{
  $sales_agent=$_SESSION['auth']['id'];
}

$image= rand(0,1000) . $_FILES['image']['name'];
$tmpname=$_FILES['image']['tmp_name'];
$location="./upload/$image";
move_uploaded_file($tmpname,$location);




if(empty($errors)){
  $insert="INSERT INTO `properties` VALUES (null,'$title','$description','$price','$image','$sales_agent')";
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
  <h1>Create Property</h1>
  <nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=baseurl()?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?=baseurl('app/properties/create.php')?>">Create Property</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section container">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Create Property <a class="float-end text-primary" href="<?=baseurl()?>">Go Back</a></h5>
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
          <form method="post" enctype="multipart/form-data">
            <div class="row mb-4">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Property Tilte</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="inputText">
              </div>
            </div>
            <div class="row mb-4">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Property description</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="description" >
              </div>
            </div>
            <div class="row mb-4">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Property Price</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="price" id="inputPassword">
              </div>
            </div>
            <?php if($_SESSION['auth']['rule']==1 || $_SESSION['auth']['rule']==2):?>

            <div class="row mb-4">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Agent</label>
              <div class="col-sm-10">
                <select class="form-control" name="agent_id">
                  <?php foreach($s as $item):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                  <?php endforeach?>
                </select>
              </div>
            </div>
            <?php endif?>
            <div class="row mb-4">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Property Image</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" name="image">
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