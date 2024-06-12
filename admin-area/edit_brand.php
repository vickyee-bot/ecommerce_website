<?php
$brand_title="";
if(isset($_GET['edit_brands'])){
    $edit_id_brand=$_GET['edit_brands'];
    //echo $edit_id;
    $get_brand="select * from brands where brand_id=$edit_id_brand";
    $result=mysqli_query($con,$get_brand);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];
}
?>

<h3 class="text-center text-success">Edit Brand</h3>
<form method="POST"> <!-- Add a form tag -->
    <div class="form-outline mb-4 w-50 m-auto mb-4">
        <label for="product_brand" class="from-label">Product Brand</label>
        <input type="text" name="brand_title" class="form-control" required="required" value="<?php echo $brand_title; ?>">
    </div>

    <!-- update -->
    <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="update_brand" id="update_brand" class="btn btn-info mb-3 px-3" value="Update brand">
    </div>
</form> <!-- Close the form tag -->

<?php
// editing brands
if(isset($_POST['update_brand'])){
    $brand_title=$_POST['brand_title'];

    //query to update brand
    $update_brand="update brands set brand_title='$brand_title' where brand_id=$edit_id_brand"; // Note: Added single quotes around $brand_title
    $result_update_brand=mysqli_query($con,$update_brand);
    if($result_update_brand){
        echo "<script>alert('Brand updated successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}
?>
