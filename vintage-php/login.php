<?php
session_start();
if(isset($_SESSION['email_admin'])){
  header('Location:logout.php');
  exit();
}

  $conn=mysqli_connect("localhost","root","","classicmodels");
  if(!$conn){
    die("Error".mysqli_connect_error());
  }
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $email=$_POST['email']??'';
  $password=$_POST['password']??'';

  $email = mysqli_real_escape_string($conn, $email);
  $password = mysqli_real_escape_string($conn, $password);
  
  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password';";
  $result=mysqli_query($conn,$sql);

  if(mysqli_num_rows($result) > 0){
    $user=mysqli_fetch_assoc($result);
    $_SESSION['fname'] = $user['fname'];
    $_SESSION['lname'] = $user['lname'];
    $_SESSION['email'] = $user['email'];
    header("Location:welcome.php");
    exit;
  }
}
    ?>

<?php
require __DIR__ . '/inc/functions.inc.php'; 

?>


<?php require __DIR__ . '/views/header.inc.php'; ?>
<div class="container-fluid  ">
  <div class="row min-vh-100">
    
 <div class="col-md-6 p-0">
      <img src="img/SkunkTrainRails_ThomasHawk.jpg"
          class="img-fluid h-100 w-100 object-fit-cover"
          alt="train">
    </div>


<div class="col-md-6 d-flex align-items-center justify-content-center">
  <div class="border p-4 rounded shadow w-75 bg-white">

   
<h1>Login To Vintage</h1>
<form method="POST">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" required>
   
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <div class="mb-3">
    <a href="register.php">You don't have an acount? Register here!</a>
    <a href="login_admin.php">Login as Admin.</a>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</div>
</div>


<?php require __DIR__ . '/views/footer.inc.php'; ?>