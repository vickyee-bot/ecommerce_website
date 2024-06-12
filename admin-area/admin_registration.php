<?php
    include('../includes/connect.php');
    include('../functions/common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container-fluid m-3 mt-5">
        <h2 class="text-center mb-5">Admin Registration</h2>
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
                        <label for="email" class="form-label">Email</label><br>
                        <input type="text" id="admin_email" name="admin_email" placeholder="Enter your email" required="required" class="form-control m-auto">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label><br>
                        <input type="password" id="admin_password" name="admin_password" placeholder="Enter your password" required="required" class="form-control m-auto">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confim Password</label><br>
                        <input type="password" id="admin_confirm_password" name="admin_confirm_password" placeholder="confirm password" required="required" class="form-control m-auto">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0 mb-2" name="admin_registration" value="Register" id="admin_register">
                    </div>
                    <p>Already have an account? <a href="admin_login.php" class="text-danger mt-2">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['admin_registration'])){
    // Include your database connection here
    // Assuming $con is your database connection
    
    $admin_username = $_POST['admin_username'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $admin_confirm_password = $_POST['admin_confirm_password'];

    // Check if username or email already exist
    $select_query = "SELECT * FROM admin_table WHERE admin_username='$admin_username' OR admin_email='$admin_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);

    if($rows_count > 0) {
        echo "<script>alert('Username or email already exists')</script>";
    } elseif($admin_password != $admin_confirm_password) {
        echo "<script>alert('Passwords do not match')</script>";
    } else {
            // Insert user data into the database
            $insert_query = "INSERT INTO admin_table (admin_username, admin_email, admin_password) VALUES ('$admin_username', '$admin_email', '$hash_password')";
            $sql_execute = mysqli_query($con, $insert_query);
            if($sql_execute) {
                echo "<script>alert('Registration successful')</script>";
            } else {
                die(mysqli_error($con));
            }
        } 
    }
    ?>
