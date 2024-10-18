<?php
include_once '../../shared/head.php';

auth(2);

$counter=1;

$select="SELECT * FROM `admin_data`";
$s=mysqli_query($connect,$select);

if(isset($_GET['delete'])){
$id=$_GET['delete'];
$query="DELETE  FROM `admins` WHERE id=$id";
$del=mysqli_query($connect,$query);
header('Location: ' . baseurl('app/admins/'));
}

?>

<body>
<?php 
include_once '../../shared/header.php';
include_once '../../shared/aside.php';
?>
  <main id="main" class="main">

<div class="pagetitle">
  <h1>Admins Table</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= baseurl()?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?=baseurl('app/admins/')?>">Admins</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">


    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Admins Table <a class="float-end text-primary" href="./create.php">Create New</a></h5>

          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created_By</th>
                <th scope="col">Action</th>
                <?php if($_SESSION['auth']['rule']==1):?>
                <th scope="col">Action</th>
                <?php endif ?>


              </tr>
            </thead>
            <tbody>
              <?php foreach($s as $items):?>
              <tr>
                <th scope="row"><?=$counter++?></th>
                <td><?=$items['name']?></td>
                <td><?=$items['email']?></td>
                <?php if($items['created_by']==NUll):?>
                <td><span class="badge bg-success"><?='Owner'?></span></td>
                <?php else: ?>
                <td><?=$items['created_by']?></td>
                <?php endif?>
                <td><a class="text-primary" href="./view.php?view=<?=$items['id']?>">View</a></td>
                <?php if($_SESSION['auth']['rule']==1):?>
                <td><a class="text-danger" href="./index.php?delete=<?=$items['id']?>">Delete</a></td>
                <?php endif ?>
              </tr>
            <?php endforeach?>

            </tbody>
          </table>
          <!-- End Table with stripped rows -->

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