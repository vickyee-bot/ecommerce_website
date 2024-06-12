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
    <h1 class="text-center text-success">All Orders</h1>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>Order Id</th>
                <th>Userid</th>
                <th>Invoice Number</th>
                <th>Product Id</th>
                <th>Quantity</th>
                <th>Order Status</th>
            </tr>
        </thead>
        
        <tbody class="bg-secondary text-light">
            <?php
            global $con;
            $get_orders="select * from orders_pending";
            $result=mysqli_query($con,$get_orders);
            while($row=mysqli_fetch_assoc($result)){
                $order_id=$row['order_id'];
                $userid=$row['userid'];
                $invoice_number=$row['invoice_number'];
                $product_id=$row['product_id'];
                $quantity=$row['quantity'];
                $order_status=$row['order_status'];
                ?>
                <tr class='text-center'>
                <td><?php echo $order_id; ?></td>
                <td><?php echo $userid; ?></td>
                <td><?php echo $invoice_number;?></td>
                <td><?php echo $product_id;?></td>
                <td><?php echo $quantity;?></td>
                <td><?php echo $order_status;?></td>

                <!--<td><a class='icon-link' href='index.php?delete_user=<?php echo $user_id; ?>'><svg class='bi' aria-hidden='true'><use xlink:href='#box-seam'></use></svg><i class='fas fa-trash-alt'></i></a>
            </td> -->
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
