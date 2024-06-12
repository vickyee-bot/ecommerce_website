<!-- connect files -->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- css file -->
    <link rel="stylesheet" href="../style.css">

    <style>
        .admin-image {
    width: 100px;
    object-fit: contain;
}
    </style>
</head>
<body>
  <!-- navbar -->
  <div class="container-fluid p-0">

    <!-- first child -->
    <nav class="navbar navbar-expand-lg nav-light bg-info">
        <div class="container-fluid">
            <img src="../images/logo.png" alt="" class="logo">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav">
                <?php
        if(!isset($_SESSION['admin_username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='3'>Welcome Guest</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='index.php'>Welcome ".$_SESSION['admin_username']."</a>
        </li>";
        }

if(!isset($_SESSION['admin_username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='admin_login.php'>login</a>
</li>";
}else{
  echo "<li class='nav-item'>
  <a class='nav-link' href='admin_logout.php'>logout</a>
</li>";
}
?>
                </ul>
            </nav>
        </div>
    </nav>

    <!-- second child -->
    <div class="bg-light">
        <h3 class="text-center p-2">Manager</h3>
    </div>

    <!-- third child -->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="p-3">
                <a href="#"><img src="../images/office.jpg" alt="" class="admin-image"></a>
                <p class="text-light text-center">Admin <?php."$_SESSION['admin_username']"?></p>
            </div>
            <!-- button*10>a.nav-link.text-light.bg-info.my-1 -->
            <div class="button text-center">
                <button><a href="index.php?insert_products" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">insert categories</a></button>
                <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">view Categories</a></button>
                <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                <button><a href="index.php?all_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
                <!--<button><a href="" class="nav-link text-light bg-info my-1">All Payments</a></button>-->
                <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List users</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
            </div>
        </div>
    </div>
  </div>


    <!-- fourth child -->
    <div class="container my-3">
        <?php
        if(isset($_GET['insert_products'])){
            include('insert_products.php');
        }
        if(isset($_GET['insert_category'])){
            include('insert_category.php');
        }
        if(isset($_GET['insert_brands'])){
            include('insert_brands.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }
        if(isset($_GET['delete_product'])){
            include('delete_product.php');
        }
        if(isset($_GET['view_categories'])){
            include('view_categories.php');
        }
        if(isset($_GET['edit_category'])){
            include('edit_categories.php');
        }
        if(isset($_GET['delete_category'])){
            include('delete_categories.php');
        }
        if(isset($_GET['view_brands'])){
            include('view_brands.php');
        }
        if(isset($_GET['edit_brands'])){
            include('edit_brand.php');
        }
        if(isset($_GET['delete_brand'])){
            include('delete_brands.php');
        }
        if(isset($_GET['list_users'])){
            include('list_users.php');
        }
        if(isset($_GET['delete_user'])){
            include('delete_users.php');
        }
        if(isset($_GET['all_orders'])){
            include('all_orders.php');
        }
        ?>
    </div>


<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>