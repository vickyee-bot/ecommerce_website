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
    <title>User-Login</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .container-fluid{
            border-width: 5px;
            border-style: solid;
            border-color: white;
            margin: auto;
            height: 100%
            padding: 5px;
        }
    </style>
</head>
<body class="bg-info">
    <div class="container-fluid">
        <h2 class="text-center mt-5">Login</h2>
        <div class="row d-flex justify-content-center align-items-center mt-5 m-auto">
        <div class="col-lg-6 col-xl-5">
                <img src="../images/ecommerce.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6 col-x1-5 d-flex align-items-center justify-content-center">
                <form action="" method="post">
                    <!-- username -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your name" autocomplete="off" required="required" name="user_username">
                    </div>
                    
                    <!-- password -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                    
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account.<a href="user_registration.php"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
global $con;
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    
    $select_query="Select * from user_table where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();


    // cart item
    $select_query_cart="select * from cart_details where ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
    if($row_count>0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password,$row_data['user_password'])){
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_username;
          echo "<script>alert('login success')</script>";
          echo "<script>window.open('../index.php','_self')</script>";
            } else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('login success')</script>";
                echo "<script>window.open('payment.php','_self')</script>"; 
            }
        }else{
        echo "<script>alert('Invalid Credentials')</script>";  
        }
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>