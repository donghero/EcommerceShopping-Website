<?php
include ("db.php");
global $conn;
if (isset($_POST['p_no'])){

    $del_id=$_POST['p_no'];
    $query="delete from products where p_no= '$del_id' ";
    $result=mysqli_query($conn,$query);
    if($result){
        echo"remove data success!";
    }else{
        echo "remove data fail!";
    }
}

