<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

</head>
<body>
    <?php
$username=$_SESSION['username'];
$get_user="select * from user_table where username='$username'";
$result=mysqli_query($con,$get_user);
$row_fetch=mysqli_fetch_assoc($result);
$user_id=$row_fetch['user_id'];

?>
<h3 class="text-center text-success">All my Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
    <tr>
       <th>Serial Number</th>
       <th>Amount Due</th>
       <th>Total products</th>
       <th>Invoice number</th>
       <th>Date</th>
       <th>Complete/Incomplete</th>
       <th>Status</th>
    </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
$get_order_details="select * from user_orders where user_id=$user_id";
$result_orders=mysqli_query($con,$get_order_details);
while($row_orders=mysqli_fetch_assoc($result_orders)){
    $order_id=$row_orders['order_id'];
    $amount_due=$row_orders['amount_due'];
    $amount_due=$row_orders['amount_due'];
    $total_products=$row_orders['total_products'];
    $invoice_number=$row_orders['invoice_number'];
    $order_status=$row_orders['order_status'];
    if($order_status=='pending'){
        $order_status='Incomplete';
    }else{
        $order_status='Complete';
    }
    $order_date=$row_orders['order_date'];
    $number=1;
    echo "<tr>
    <td>$number</td>
    <td>$amount_due</td>
    <td>$total_products</td>
    <td>$invoice_number</td>
    <td>$order_date</td>
    <td>$order_status</td>";
    ?>
    <?php
    if($order_status=='Complete'){
        echo "<td>Paid</td>";
    }else{
        echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text=light'>Confirm</a></td>
        </tr>";
    }
    
$number++;
}
?>
        
    </tbody>
</table>
</body>
</html>