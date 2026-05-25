<?php


$id=(int)$_GET['id'];

  $conn=mysqli_connect("localhost","root","","classicmodels");
  if(!$conn){
    die("Error".mysqli_connect_error());
  }
  
$sql = "DELETE FROM users WHERE user_id=$id; ";
mysqli_query($conn,$sql);
   header('Location:../edit_user.php');
    exit;
    ?>
