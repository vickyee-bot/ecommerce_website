<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container-fluid m-3 mt-5">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/ecommerce.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label><br>
                        <input type="text" id="admin_username" name="admin_username" placeholder="Enter your username" required="required" class="form-control m-auto">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label><br>
                        <input type="password" id="admin_password" name="admin_password" placeholder="Enter your password" required="required" class="form-control m-auto">
                    </div>
                    
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0 mb-2" name="admin_login" value="Login" id="admin_login">
                    </div>
                    <p>Don't have an account? <a href="admin_registration.php" class="text-danger mt-2">Register</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
global $con;
if(isset($_POST['admin_login'])){
    $admin_username=$_POST['admin_username'];
    $admin_password=$_POST['admin_password'];
    
    $select_query="Select * from admin_table where admin_username='$admin_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    if($row_count>0){
        $_SESSION['username']=$admin_username;
        if(password_verify($admin_password,$row_data['admin_password'])){
            if($row_count==1){
                $_SESSION['admin_username']=$admin_username;
          echo "<script>alert('login success')</script>";
          echo "<script>window.open('./index.php','_self')</script>";
            }else{
        echo "<script>alert('Invalid Credentials')</script>";  
        }
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
}
?>