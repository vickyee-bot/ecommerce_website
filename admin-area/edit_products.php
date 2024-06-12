<?php
// Initialize variables with default values
$product_title = "";
$product_description = "";
$product_keyword = "";
$category_id = "";
$brand_id = "";
$product_image1 = "";
$product_image2 = "";
$product_image3 = "";
$product_price = "";

if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    //echo $edit_id;
    $get_data="select * from products where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    //echo $product_title;
    $product_description=$row['product_description'];
    $product_keyword=$row['Product_keyword'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];
}

//fetching category name if category_id is not empty
if (!empty($category_id)) {
    $select_category="select * from categories where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];
    //echo $category_title;
}

//fetching brand name if brand_id is not empty
if (!empty($brand_id)) {
    $select_brand="select * from brands where brand_id=$brand_id";
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];
    //echo $brand_title;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit products</title>
    <style>
        img {
            width: 100px;
    object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Product</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto mb-4">
                <label for="product_title" class="from-label">Product Title</label>
                <input type="text" name="product_title" class="form-control" required="required" value="<?php echo $product_title; ?>">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto mb-4">
                <label for="product_description" class="from-label">Product Description</label>
                <input type="text" name="product_description" value="<?php echo $product_description; ?>" class="form-control" required="required" >
            </div>
            <!-- keyword -->
            <div class="form-outline mb-4 w-50 m-auto mb-4">
                <label for="product_keyword" class="from-label">Product Keyword</label>
                <input type="text" name="product_keyword" class="form-control" required="required">
            </div>
            <!-- categories from the database -->
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="Product_image2" class="form-label"><h5>Category</h5></label>
    <select name="product_category" id="" class="form-select">
        <?php if (isset($category_title)) { ?>
            <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
        <?php } else { ?>
            <option value="">Category Not Available</option>
        <?php } ?>
        <?php
        $select_category_all="select * from categories";
        $result_category_all=mysqli_query($con,$select_category_all);
        while($row_category_all=mysqli_fetch_assoc($result_category_all)){
            $category_title=$row_category_all['category_title'];
            $category_id=$row_category_all['category_id'];
            echo "<option value='$category_id'>$category_title</option>'";
        };
        ?>
    </select>
</div>

<!-- brands -->
<div class="form-outline mb-4 w-50 m-auto">
<label for="Product_image2" class="form-label"><h5>Brand</h5></label>
    <select name="product_brand" id="" class="form-select">
        <?php if (isset($brand_title)) { ?>
            <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
        <?php } else { ?>
            <option value="">Brand Not Available</option>
        <?php } ?>
        <?php
        $select_brand_all="select * from brands";
        $result_brand_all=mysqli_query($con,$select_brand_all);
        while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
            $brand_title=$row_brand_all['brand_title'];
            $brand_id=$row_brand_all['brand_id'];
            echo "<option value='$brand_id'>$brand_title</option>'";
        };
        ?>
    </select>
</div>

            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto d-flex">
                <label for="Product_image1" class="form-label"><h5>Product image 1</h5></label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
                <img src="./product_images/<?php echo $product_image1; ?>" alt="">
            </div>
            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto d-flex">
                <label for="Product_image2" class="form-label"><h5>Product image 2</h5></label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
                <img src="./product_images/<?php echo $product_image2; ?>" alt="">
            </div>
            <!-- Image 3 -->
            <div class="form-outline mb-4 w-50 m-auto d-flex">
                <label for="Product_image3" class="form-label"><h5>Product image 3</h5></label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
                <img src="./product_images/<?php echo $product_image3; ?>" alt="">
            </div>
            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label"><h5>Product price</h5></label>
                <input type="text" name="product_price" value="<?php echo $product_price; ?>" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>
            <!-- update -->
            <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="edit_product" id="edit_product" class="btn btn-info mb-3 px-3" value="Update Product">
            </div>
        </form>
    </div>
</body>
</html>
<?php
// editing products
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keyword=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image2,"./product_images/$product_image2");
    move_uploaded_file($temp_image3,"./product_images/$product_image3");

    //query to update products
    $update_product="update products set product_title='$product_title',product_description='$product_description',Product_keyword='$product_keyword',category_id='$product_category',brand_id='$product_brand',product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',product_price='$product_price' where product_id=$edit_id";
    $result_update=mysqli_query($con,$update_product);
    if($result_update){
        echo "<script>alert('Product updated successfully')</script>";
        echo "<script>window.open('./index.php?view_products','_self')</script>";
    }

}
?>