<?php

session_start();
if(!isset($_SESSION['email'])){
    header("Location:login.php");
    exit;
}

$conn=mysqli_connect("localhost","root","","classicmodels");

if(!$conn){
    die("Error".mysqli_connect_error());
  }

$sql = "SELECT * FROM products WHERE productLine='MotorCycles'";
$result=mysqli_query($conn,$sql);

?>
<?php
require __DIR__ . '/inc/functions.inc.php'; 

?>

<?php require __DIR__ . '/views/header.inc.php'; ?>
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container text-center ">
          <h1 class="d-flex align-items-center justify-content-center">MotorCycles </h1>

<div class="row mt-4"> 
    <?php
     while ($row = mysqli_fetch_assoc($result)) {
        ?>
    <div class="card" style="width:100%;">
  <div class="card-body">
    <h3 class="card-title" style="text-decoration: underline;"><?php echo $row['productName'];?></h3>
    <h6 class="card-subtitle mb-2 text-body-secondary"><?php  echo $row['productCode'];?></h6>
    <p class="card-text"><?php  echo $row['productDescription'];?></p>
    <p><b>Price:</b> <?php echo $row['buyPrice']."$" ;?></p>
  </div>
</div>

<?php
}
?>
</div>
</div>


<?php require __DIR__ . '/views/footer.inc.php'; ?>