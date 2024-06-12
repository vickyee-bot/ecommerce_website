<?php
if(isset($_GET['delete_user'])){
    $delete_id_user=$_GET['delete_user'];

    //delete query
    $delete_user="delete from user_table where user_id=$delete_id_user";
    $result_user=mysqli_query($con,$delete_user);
    if($result_user){
        echo "<script>alert('User deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_users','_self')</script>";
    }else{
        echo "<h3 class='text-center text-danger'>No Available Users Currently</h3>";
    }
}
?>
