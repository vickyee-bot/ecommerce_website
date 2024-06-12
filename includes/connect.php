<?php

$con=mysqli_connect('localhost','root','','mystore');
if($con){
    echo "";
}
else{
    die(mysqli_error($con));
}


?>