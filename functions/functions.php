<?php
//include ("conn.php");

$conn = mysqli_connect("localhost:3305", "root", "1234", "dj");


function get_categories()
{
	global $conn;
	$get_categories = "select * from categories";
	$run_categories = mysqli_query($conn, $get_categories);
	$row_categories = mysqli_fetch_array($run_categories);
	while ($row_categories) {
		$cat_id = $row_categories['cat_id'];
		$cat_title = $row_categories['cat_title'];
		$cat_desc = $row_categories['cat_desc'];

		echo "

            <li>

                <a href='shop.php?categories=$cat_id'> $cat_title </a>

            </li>

        ";
	}
}

function get_product_categories()
{
	global $conn;
	$get_product_categories = "select * from product_categories ";
	$run_product_categories = mysqli_query($conn, $get_product_categories);
	$row_product_categories = mysqli_fetch_array($run_product_categories);
	while ($row_product_categories) {
		$p_cat_id = $row_product_categories['p_cat_id'];
		$p_cat_title = $row_product_categories['$p_cat_title'];
		$p_cat_desc = $row_product_categories['$p_cat_desc'];

		echo "

            <li>

                <a href='shop.php?product_categories=$p_cat_id'> $p_cat_title </a>

            </li>

        ";
	}
}


//获取user当前的ip
function getRealIpUser()
{

	switch (true) {

		case(!empty($_SERVER['HTTP_X_REAL_IP'])) :
			return $_SERVER['HTTP_X_REAL_IP'];
		case(!empty($_SERVER['HTTP_CLIENT_IP'])) :
			return $_SERVER['HTTP_CLIENT_IP'];
		case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) :
			return $_SERVER['HTTP_X_FORWARDED_FOR'];

		default :
			return $_SERVER['REMOTE_ADDR'];

	}

}


//物品添加到购物车
function add_cart()
{

	global $conn;

	if (isset($_GET['add_cart'])) {

		$ip_add = getRealIpUser();

		$p_id = $_GET['add_cart'];

		$product_quantity = $_POST['product_quantity'];

		$product_size = $_POST['product_size'];

		$check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
		$run_check = mysqli_query($conn, $check_product);


		if (mysqli_num_rows($run_check) > 0) {

			echo "<script>alert('This product has already added in cart')</script>";
			echo "<script>window.open('product.php?pro_id=$p_id','_self')</script>";

		} else {

			$query = "insert into cart (p_id,ip_add,quantity,size) values ('$p_id','$ip_add','$product_quantity','$product_size')";

			$run_query = mysqli_query($conn, $query);
			echo "<script>window.open('product.php?pro_id=$p_id','_self')</script>";
		}

	}
}


//cookie 获取user名
function user()
{
	global $conn;
	$temps = $_COOKIE['COOKIES'];
	$COOKIE = explode("//", "$temps");
	$query = "select *from member where user='$COOKIE[0]'";
	$result = mysqli_query($conn, $query);
	$user = mysqli_fetch_array($result);
	return $user;
}


//获取物品的数量
function items()
{

	global $conn;

	$ip_add = getRealIpUser();

	$get_items = "select * from cart where ip_add='$ip_add'";

	$run_items = mysqli_query($conn, $get_items);

	$count_items = mysqli_num_rows($run_items);

	echo $count_items;

}


//(remove button)delete data
function delete()
{
	global $conn;
	if (isset($_POST['p_id'])) {

		$del_id = $_POST['p_id'];
		$query = "delete from cart where p_id= '$del_id' ";
		$result = mysqli_query($conn, $query);
		if ($result) {
			echo "宝贝已删除";
		} else {
			echo "宝贝删除失败，请稍等";
		}
	}

}

function plus_minus_quantity()
{
	global $conn;
	$plus_id = $_POST['id'];
	$plus_value = $_POST['value'];
	$query = "update cart set quantity='$plus_value' where p_id='$plus_id'";
	$result = mysqli_query($conn, $query);
	if ($result) {
		echo "您已修改数量";
	} else {
		echo "修改数量失败";
	}


}

//confirm buying products
function buy()
{
	global $conn;
	if (isset($_POST['username'])) {

		$username = $_POST['username'];

		$ip_add = getRealIpUser();

		$status = "paid";

		$invoice_no = mt_rand();

		$select_cart = "select * from cart where ip_add='$ip_add'";

		$run_cart = mysqli_query($conn, $select_cart);

		while ($row_cart = mysqli_fetch_array($run_cart)) {

			$pro_id = $row_cart['p_id'];

			$pro_qty = $row_cart['quantity'];

			$pro_size = $row_cart['size'];

			$get_products = "select * from products where p_no='$pro_id'";

			$run_products = mysqli_query($conn, $get_products);

			while ($row_products = mysqli_fetch_array($run_products)) {
				$pro_price = $row_products['product_price'];

				$pro_title = $row_products['product_title'];

				$sub_total = $row_products['product_price'] * $pro_qty;

				$insert_customer_order = "insert into customer_orders (customer_id,due_amount,invoice_no,quantity,size,order_date,product_title,product_price,order_status) 
                            values ('$username','$sub_total','$invoice_no','$pro_qty','$pro_size',NOW(),'$pro_title','$pro_price','$status')";

				$run_customer_order = mysqli_query($conn, $insert_customer_order);

				$query = "delete from cart where ip_add='$ip_add' ";

				$result = mysqli_query($conn, $query);

				$pending_query = "delete from pending_orders where customer_id='$username'";

				$pending_result = mysqli_query($conn, $pending_query);

			}

		}
	}
}


//close buying products
function close()
{
	global $conn;
	if (isset($_POST['username'])) {

		$username = $_POST['username'];

		$ip_add = getRealIpUser();

		$status = "unpaid";

		$invoice_no = mt_rand();

		$select_cart = "select * from cart where ip_add='$ip_add'";

		$run_cart = mysqli_query($conn, $select_cart);

		while ($row_cart = mysqli_fetch_array($run_cart)) {

			$pro_id = $row_cart['p_id'];

			$pro_qty = $row_cart['quantity'];

			$pro_size = $row_cart['size'];

			$get_products = "select * from products where p_no='$pro_id'";

			$run_products = mysqli_query($conn, $get_products);

			while ($row_products = mysqli_fetch_array($run_products)) {

				$sub_total = $row_products['product_price'] * $pro_qty;

				$insert_pending_order = "insert into pending_orders (customer_id,invoice_no,product_id,quantity,size,order_status) values ('$username','$invoice_no','$pro_id','$pro_qty','$pro_size','$status')";;

				$run_customer_order = mysqli_query($conn, $insert_pending_order);


			}

		}
	}
}

//contact us
function contact()
{
	global $conn;
	mysqli_set_charset($conn, "UTF8");
	if (isset($_POST['submit'])) {
		$con_name = $_POST['con_name'];
		$con_email = $_POST['con_email'];
		$con_phone = $_POST['con_phone'];
		$con_inquiry = $_POST['con_inquiry'];
		$con_message = $_POST['con_message'];

	}
	$insert = "insert into contact(name, email, phone, inquire_type,date,message) VALUES ('$con_name','$con_email','$con_phone','$con_inquiry',NOW(),'$con_message')";
	$run_insert = mysqli_query($conn, $insert);
	if ($run_insert) {
		echo "<script>alert('your question already submitted!')</script>";
	} else {
		echo "<script>alert('your questions are not submitted!')</script>";
	}
}
//check error
//$run_product = mysqli_query($conn,$insert_product);
//if ($run_product) {
//    echo "New records created successfully";
//} else {
//    echo "Error: " . $insert_product . "<br>" . mysqli_error($conn);
//}


