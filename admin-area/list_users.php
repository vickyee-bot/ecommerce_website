<?php
include('../includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .product_img1{
            width: 100px;
    object-fit: contain;
        }
    </style>
</head>
<body>
    <h1 class="text-center text-success">All Users</h1>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>User Id</th>
                <th>Username</th>
                <th>User Email</th>
                <th>User Address</th>
                <th>User Mobile</th>
                <th>Delete User</th>
            </tr>
        </thead>
        
        <tbody class="bg-secondary text-light">
            <?php
            global $con;
            $get_users="select * from user_table";
            $result=mysqli_query($con,$get_users);
            while($row=mysqli_fetch_assoc($result)){
                $user_id=$row['user_id'];
                $username=$row['username'];
                $user_email=$row['user_email'];
                $user_address=$row['user_address'];
                $user_mobile=$row['user_mobile'];
                ?>
                <tr class='text-center'>
                <td><?php echo $user_id; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $user_email;?></td>
                <td><?php echo $user_address;?></td>
                <td><?php echo $user_mobile;?></td>

                <td><a class='icon-link' href='index.php?delete_user=<?php echo $user_id; ?>'><svg class='bi' aria-hidden='true'><use xlink:href='#box-seam'></use></svg><i class='fas fa-trash-alt'></i></a>
            </td>
        </tr>
        <?php
            }

            ?>
            
        </tbody>
    </table>
    <?php
        include("../includes/footer.php")
    ?>
</body>
</html>
