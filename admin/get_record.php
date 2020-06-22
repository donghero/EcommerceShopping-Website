<?php
include ("db.php");
 global $conn;
if (isset($_POST['p_no'])){
    $p_no=$_POST['p_no'];
    $query="select * from products where p_no='$p_no'";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($result)){
        $user_data=[];
        $user_data [0]=$row['product_title'];
        $user_data [1]=$row['product_desc'];
        $user_data [2]=$row['product_keywords'];
//        $user_data [3]=$row['product_quantity'];
        $user_data [4]=$row['product_price'];
        $user_data [5]=$row['product_img1'];
//        echo $pro_title;
    }
    echo json_encode($user_data);
}


