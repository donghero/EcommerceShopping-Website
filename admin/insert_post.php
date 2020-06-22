<?php
include("db.php");
header("Content-type:text/html;charset=utf-8");
if (isset($_POST['submit'])) {

//    $product_title = $_POST['product_title'];
//    $product_cat = $_POST['product_cat'];
//    $cat = $_POST['cat'];
//    $product_price = $_POST['product_price'];
//    $product_keywords = $_POST['product_keywords'];
//    $product_desc = $_POST['product_desc'];


	$product_title = $_POST['product_title'];
	$product_cat = $_POST['product_cat'];
	$cat = $_POST['cat'];
	$product_price = $_POST['product_price'];
	$product_keywords = $_POST['product_keywords'];
	$product_desc = $_POST['product_desc'];

	$product_img1 = $_FILES['product_img1']['name'];  // the name of the upload file
	$product_img2 = $_FILES['product_img2']['name'];
	$product_img3 = $_FILES['product_img3']['name'];

	$temp_name1 = $_FILES['product_img1']['tmp_name'];
	$temp_name2 = $_FILES['product_img2']['tmp_name'];
	$temp_name3 = $_FILES['product_img3']['tmp_name'];

	move_uploaded_file($temp_name1, "../product_images/$product_img1");
	move_uploaded_file($temp_name2, "../product_images/$product_img2");
	move_uploaded_file($temp_name3, "../product_images/$product_img3");

	$insert_product = "insert  into products(p_cat_id,cat_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_keywords,product_desc)
values ($product_cat,'$cat',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_keywords','$product_desc')";

	$run_product = mysqli_query($conn, $insert_product);
	if ($run_product) {
		echo  "<script>window.alert('您的宝贝已添加')</script>";
		echo "<script>location.href='tables.php'</script>";
	} else {
		echo "Error: " . $insert_product . "<br>" . mysqli_error($conn);
	}

//    if($run_product){
//        echo "<script>window.alert('Product has been inserted successfully')</script>";
//        echo "<script>window.open('insert.php','_self')</script>";
//
//    }


}