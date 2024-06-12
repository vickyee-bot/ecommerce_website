<?php
if(isset($_GET['delete_brand'])){
    $delete_id_brand=$_GET['delete_brand'];

    //delete query
    $delete_brand="delete from brands where brand_id=$delete_id_brand";
    $result_product=mysqli_query($con,$delete_brand);
    if($result_product){
        echo "<script>alert('brand deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}
?>