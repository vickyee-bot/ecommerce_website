<?php
if(isset($_GET['delete_category'])){
    $delete_id_category=$_GET['delete_category'];

    //delete query
    $delete_category="delete from categories where category_id=$delete_id_category";
    $result_product=mysqli_query($con,$delete_category);
    if($result_product){
        echo "<script>alert('category deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}
?>