<?php
include_once '../../shared/head.php';

auth(2);

$counter=1;

$select="SELECT * FROM `messages`";
$s=mysqli_query($connect,$select);

if(isset($_GET['delete'])){
$id=$_GET['delete'];
$query="DELETE  FROM `messages` WHERE id=$id";
$del=mysqli_query($connect,$query);
header('Location: ' . baseurl('app/admins/messages.php'));
}

?>

<body>
<?php 
include_once '../../shared/header.php';
include_once '../../shared/aside.php';
?>
  <main id="main" class="main">

<div class="pagetitle">
  <h1>Messages Table</h1>
  <nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=baseurl()?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?=baseurl('app/admins/messages.php')?>">Messages</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">


    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Messages Table</h5>

          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col">Action</th>


              </tr>
            </thead>
            <tbody>
              <?php foreach($s as $items):?>
              <tr>
                <th scope="row"><?=$counter++?></th>
                <td><?=$items['name']?></td>
                <td><?=$items['email']?></td>
                <td><?=$items['message']?></td>

                <td><a class="text-danger" href="./messages.php?delete=<?=$items['id']?>">Delete</a></td>
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