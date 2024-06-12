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
    <h1 class="text-center text-success">All Products</h1>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>Product Id</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        
        <tbody class="bg-secondary text-light">
            <?php
            global $con;
            $get_products="select * from products";
            $result=mysqli_query($con,$get_products);
            while($row=mysqli_fetch_assoc($result)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                ?>
                <tr class='text-center'>
                <td><?php echo $product_id; ?></td>
                <td><?php echo $product_title; ?></td>
                <td><img src='./product_images/<?php echo $product_image1;?>' alt='' class='product_img1'></td>
                <td><?php echo $product_price;?>/-</td>
                <td><?php
                $get_count="select * from orders_pending where product_id=$product_id";
                $result_count=mysqli_query($con,$get_count);
                $row_count=mysqli_num_rows($result_count);
                echo $row_count;
                ?></td>
                <td><a class='icon-link icon-link-hover' style='--bs-link-hover-color-rgb: 25, 135, 84;' href='index.php?edit_products=<?php echo $product_id; ?>'><i class='fas fa-pen-square px-3'></i><svg class='bi' aria-hidden='true'><use xlink:href='#arrow-right'></use></svg></a>
                </td>
                <td><a class='icon-link' href='index.php?delete_products=<?php echo $product_id; ?>'><svg class='bi' aria-hidden='true'><use xlink:href='#box-seam'></use></svg><i class='fas fa-trash-alt'></i></a>
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
