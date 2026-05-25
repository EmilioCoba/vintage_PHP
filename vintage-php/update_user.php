<?php


$conn = mysqli_connect("localhost", "root", "", "classicmodels");

$id = (int) $_GET["id"];

$sql = "SELECT * FROM users WHERE user_id = $id";

$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $fname=$_POST['fname']??'';
  $lname=$_POST['lname']??'';
  $email=$_POST['email']??'';
  $password=$_POST['password']??'';
  
  $conn=mysqli_connect("localhost","root","","classicmodels");
    if(!$conn){
    die("Error".mysqli_connect_error());
  }
  $fname = mysqli_real_escape_string($conn, $fname);
  $lname = mysqli_real_escape_string($conn, $lname);
  $email = mysqli_real_escape_string($conn, $email);
  $password = mysqli_real_escape_string($conn, $password);

$sql_update = "UPDATE users 
SET 
    fname='$fname',
    lname='$lname',
    email='$email',
    password='$password'
WHERE user_id='$id'";
  mysqli_query($conn,$sql_update);
  header("Location:../edit_users.php");
  exit;
 
}
?>

 



<?php
require __DIR__ . '/inc/functions.inc.php'; 

?>


<?php require __DIR__ . '/views/header.inc.php'; ?>

<div class="container-fluid  ">
  <div class="row min-vh-100">
    



<div class="col-md d-flex align-items-center justify-content-center">
  <div class="border p-4 rounded shadow w-75 bg-white">

<h1>Register To Vintage</h1>
  
<form  method="POST">
  <div class="mb-3">
    <label for="fname" class="form-label">First Name</label>
    <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $user["fname"];?>" required>
  </div>
  <div class="mb-3">
    <label for="lname" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="lname" name="lname"  value="<?php echo $user["lname"];?>" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user["email"]; ?>" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>

<?php require __DIR__ . '/views/footer.inc.php'; ?>