<?php

session_start();

if(!isset($_SESSION['email_admin'])){
    header("Location:login_admin.php");
    exit;
}

  $conn=mysqli_connect("localhost","root","","classicmodels");
  if(!$conn){
    die("Error".mysqli_connect_error());
  }
  
$sql = "SELECT * FROM users;";
$result=mysqli_query($conn,$sql);
   

    ?>

<?php
require __DIR__ . '/inc/functions.inc.php'; 

?>


<?php require __DIR__ . '/views/header.inc.php'; ?>

<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container text-center ">
    <h1>All users</h1>
    <div class="row" >
        <table border="1">
            <tr>
               <th>First Name</th>
               <th>Last Name</th>
               <th>Email</th>
            </tr>
            <?php foreach($result as $res):?>
                <tr>
                <td><?php echo $res['fname']?></td>
                <td><?php echo $res['lname']?></td>
                <td><?php echo $res['email']?></td> 
                <td><a href="update_user.php/?id=<?php echo $res['user_id']?>" id="update-<?php echo $res['user_id']?>">Edit</a></td>
                <td><a href="delete.php/?id=<?php echo $res['user_id']?>" id="delete-<?php echo $res['user_id']?>" onclick="return confirm('Are you sure you want to delete?')"; >Delete</a></td>
            </tr>
            <?php endforeach;?>
            </table>
</div>

</div>


<?php require __DIR__ . '/views/footer.inc.php'; ?>