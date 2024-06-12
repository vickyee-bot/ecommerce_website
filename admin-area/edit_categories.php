<?php
$category_title="";
if(isset($_GET['edit_category'])){
    $edit_id_category=$_GET['edit_category'];
    //echo $edit_id;
    $get_category="select * from categories where category_id=$edit_id_category";
    $result=mysqli_query($con,$get_category);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title'];
}
?>

<h3 class="text-center text-success">Edit category</h3>
<form method="POST"> <!-- Add a form tag -->
    <div class="form-outline mb-4 w-50 m-auto mb-4">
        <label for="product_category" class="from-label">Product category</label>
        <input type="text" name="category_title" class="form-control" required="required" value="<?php echo $category_title; ?>">
    </div>

    <!-- update -->
    <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="update_category" id="update_category" class="btn btn-info mb-3 px-3" value="Update category">
    </div>
</form> <!-- Close the form tag -->

<?php
// editing categorys
if(isset($_POST['update_category'])){
    $category_title=$_POST['category_title'];

    //query to update category
    $update_category="update categories set category_title='$category_title' where category_id=$edit_id_category"; // Note: Added single quotes around $category_title
    $result_update_category=mysqli_query($con,$update_category);
    if($result_update_category){
        echo "<script>alert('category updated successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}
?>
