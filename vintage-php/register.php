<?php
 session_start();
 
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

  $sql_check="SELECT * FROM users WHERE email='$email'";
  $checkResult=mysqli_query($conn,$sql_check);
 
    
    if(mysqli_num_rows($checkResult) > 0){
     
        echo "Email already exists";
  
      }else{
        
        $sql = "INSERT INTO users(fname,lname,email,password) VALUES('$fname','$lname','$email','$password');";
        $result=mysqli_query($conn,$sql);
            
        if($result){
          $_SESSION['fname'] = $fname;
          $_SESSION['lname'] = $lname;
          $_SESSION['email'] = $email;
          header("Location:welcome.php");
          exit;
          }else {
                echo "Error: " . mysqli_error($conn);
            }
       
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
      <img src="img/1969-dodge-charger-r-t--photo-credit-classic-investments_100740356.jpg"
          class="img-fluid h-100 w-100 object-fit-cover"
          alt="car">
    </div>


<div class="col-md-6 d-flex align-items-center justify-content-center">
  <div class="border p-4 rounded shadow w-75 bg-white">

<h1>Register To Vintage</h1>
  
<form  method="POST">
  <div class="mb-3">
    <label for="fname" class="form-label">First Name</label>
    <input type="text" class="form-control" id="fname" name="fname" required>
  </div>
  <div class="mb-3">
    <label for="lname" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="lname" name="lname" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" required>
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