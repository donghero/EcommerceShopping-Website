<?php
include("conn.php");
include("../functions/functions.php");
//getRealIpUser();
if(isset($_GET['add_cart'])) {
    $p_id = $_GET['add_cart'];
    $ip_add = getRealIpUser();
    $product_quantity = $_POST['product_quantity'];

    $product_size = $_POST['product_size'];

    $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

    $run_check = mysqli_query($conn, $check_product);


    if (mysqli_num_rows($run_check) > 0) {

        echo "<script>alert('This product has already added in cart')</script>";
//        echo "<script>location.reload()</script>";
        echo "<script>window.open('product.php?pro_id=$p_id','_self')</script>";

    } else {

    $query = "insert into cart (p_id,ip_add,quantity,size) values ('$p_id','$ip_add','$product_quantity','$product_size')";

        $run_query = mysqli_query($conn, $query);
//        echo "<script>location.reload()</script>";
        echo "<script>window.open('product.php?pro_id=$p_id','_self')</script>";

    }

}

?>

<!---->
<!-- --><?php
////include ("conn.php");
//include ("functions.php");
//add_cart();
//
//?>
