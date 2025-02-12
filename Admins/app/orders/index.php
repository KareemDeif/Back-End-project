<?php
include_once '../../shared/head.php';

auth(2);

$counter=1;

$select="SELECT * FROM `orders_data`";
$s=mysqli_query($connect,$select);

if(isset($_GET['delete'])){
$id=$_GET['delete'];
$query="DELETE  FROM `orders` WHERE id=$id";
$del=mysqli_query($connect,$query);
header('Location: ' . baseurl('app/orders/'));
}

?>

<body>
<?php 
include_once '../../shared/header.php';
include_once '../../shared/aside.php';
?>
  <main id="main" class="main">

<div class="pagetitle">
  <h1>Orders Table</h1>
  <nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=baseurl()?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?=baseurl('app/orders/')?>">Orders</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">


    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Orders Table <a class="float-end text-primary" href="./create.php">Create Order</a></h5>

          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Amount</th>
                <th scope="col">Client Name</th>
                <th scope="col">Property Name</th>
                <th scope="col">Action</th>
                <th scope="col">Action</th>


              </tr>
            </thead>
            <tbody>
              <?php foreach($s as $items):?>
              <tr>
                <th scope="row"><?=$counter++?></th>
                <td><?=$items['amount']?></td>
                <td><?=$items['client_name']?></td>
                <td><?=$items['property_name']?></td>
                <td><a class="text-primary" href="./view.php?view=<?=$items['id']?>">View</a></td>
                <td><a class="text-danger" href="./index.php?delete=<?=$items['id']?>">Delete</a></td>
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