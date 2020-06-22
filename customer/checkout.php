<!DOCTYPE html>
<html lang="en" xmlns="">
<head>
    <meta charset="UTF-8">
    <title>HomeShopping</title>
    <link rel="stylesheet" href="../styles/Css.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/checkout.css">
    <script src="../js.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<?php include("../conn.php") ?>
<!---------------------------------top-nav-bar------------------------------------------------>
<?php include("../home/top-nav-bar.php") ?>
<div class="container-fluid">
    <div class="row">

        <body data-spy="scroll" data-target=".navbar" data-offset="50">
        <nav class="container-fluid navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
            <ul class="navbar-nav container">
                <li class="nav-item col-md-3">
                    <a class="nav-link" href="#section1">我的订单</a>
                </li>
                <li class="nav-item col-md-3">
                    <a class="nav-link" href="#section2">상품리뷰</a>
                </li>
                <li class="nav-item col-md-3">
                    <a class="nav-link" href="#section3">我的DJ</a>
                </li>
                <li class="nav-item col-md-3">
                    <a class="nav-link" href="#section4">联系我们</a>
                </li>
            </ul>
        </nav>
		<?php
		$ip_add = getRealIpUser();
		$paid_count = "select count(*) as count from customer_orders where order_status='paid'";
		$run_paid_count = mysqli_query($conn, $paid_count);
		while ($row_paid_count = mysqli_fetch_array($run_paid_count)) {
			$paid_count = $row_paid_count['count'];
		}

		$unpaid_count = "select count(*) as count from pending_orders where order_status='unpaid'";
		$run_unpaid_count = mysqli_query($conn, $unpaid_count);
		while ($row_unpaid_count = mysqli_fetch_array($run_unpaid_count)) {
			$unpaid_count = $row_unpaid_count['count'];
		}

		?>

        <div id="section1" class="container-fluid " style="padding-top:108px;padding-bottom:70px">
            <div class="container border mt-5">
                <div class="row">
                    <div class=" col-lg-2 col-md-2 mt-3 ">
                        <p class="text-center btn-primary">待付款</p>
                        <div class="ml-4">
                            <em class="col-md-6"><?php echo $unpaid_count ?></em>
                            <i class="col-md-6 fa fa-clock-o fa-2x" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="mt-4"><i class="fa fa-chevron-right fa-2x" aria-hidden="true"></i></div>


                    <div class=" col-lg-2 col-md-2">
                        <p class="text-center btn-primary mt-3"> 已付款</p>
                        <div class="ml-4">
                            <em class="col-md-6"><?php echo $paid_count ?></em>
                            <i class="col-md-6 fa fa-credit-card-alt fa-2x" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="mt-4"><i class="fa fa-chevron-right fa-2x" aria-hidden="true"></i></div>


                    <div class=" col-lg-2 col-md-2 mt-3">
                        <p class="text-center btn-primary">待发货</p>
                        <div class="ml-4">
                            <em class="col-md-6"><?php echo $paid_count ?></em>
                            <i class="col-md-6 fa fa-cart-arrow-down fa-2x" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="mt-4"><i class="fa fa-chevron-right fa-2x" aria-hidden="true"></i></div>


                    <div class=" col-lg-2 col-md-2 mt-3">
                        <p class="text-center btn-primary ">已发货</p>
                        <div class="ml-4">
                            <em class="col-md-6">0</em>
                            <i class="col-md-6 fa fa-rocket fa-2x" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="mt-4"><i class="fa fa-chevron-right fa-2x" aria-hidden="true"></i></div>


                    <div class=" col-lg-2 col-md-2 mt-3">
                        <p class="text-center btn-primary ">待收获</p>
                        <div class="ml-4">
                            <em class="col-md-6">0</em>
                            <i class="col-md-6 fa fa-check-square-o fa-2x" aria-hidden="true"></i>
                        </div>
                    </div>
                    <!--                        <div class="col-md-2"></div>-->
                </div>
            </div>

            <div class="container mt--70">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>订单日期</th>
                        <th>宝贝</th>
                        <th>订单号</th>
                        <th>单价</th>
                        <th>数量</th>
                        <th>尺码</th>
                        <th>评论</th>
                    </tr>
                    </thead>
					<?php
					$select = "select * from customer_orders ";
					$run_select = mysqli_query($conn, $select);
					while ($row_select = mysqli_fetch_array($run_select)) {
						$date = $row_select['order_date'];
						$pro_title = $row_select['product_title'];
						$invoice_no = $row_select['invoice_no'];
						$price = $row_select['product_price'];
						$quantity = $row_select['quantity'];
						$size = $row_select['size'];
						echo "
                        <tbody>
                    <tr>
                        <td>$date</td>
                        <td>$pro_title</td>
                        <td>$invoice_no</td>
                        <td>$price</td>
                        <td>$quantity</td>
                        <td>$size</td>
                    </tr>
                    </tbody>
                    ";

					}
					?>
                </table>
            </div>
        </div>
        <div id="section2" class="container-fluid bg-warning" style="padding-top:108px;padding-bottom:70px">
            <h1>Section 2</h1>
            <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and
                look at the navigation bar while scrolling!</p>
            <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and
                look at the navigation bar while scrolling!</p>
        </div>
        <div id="section3" class="container-fluid bg-secondary" style="padding-top:108px;padding-bottom:70px">
            <div class="container mt-5">
                <div class="row">
                    <div class="ml-auto mr-auto col-lg-12">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            <span>1</span>
                                            <a data-toggle="collapse" data-parent="#faq" href="#my-account-1"
                                               aria-expanded="false" class="collapsed">我的账户</a>
                                        </h5>
                                    </div>
                                    <div id="my-account-1" class="panel-collapse collapse" style="">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>我的信息</h4>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>姓名：</label>
                                                            <input type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>个人权益：</label>
                                                            <input type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>邮箱：</label>
                                                            <input type="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>电话：</label>
                                                            <input type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Fax：</label>
                                                            <input type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-btn">
                                                        <button type="submit">继续</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            <span>2</span>
                                            <a data-toggle="collapse" data-parent="#faq" href="#my-account-2"
                                               class="collapsed" aria-expanded="false">更改密码</a>
                                        </h5>
                                    </div>
                                    <div id="my-account-2" class="panel-collapse collapse" style="">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>密码</h4>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>新密码</label>
                                                            <input type="password">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>确认密码</label>
                                                            <input type="password">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-btn">
                                                        <button type="submit">继续</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            <span>3</span>
                                            <a data-toggle="collapse" data-parent="#faq" href="#my-account-3"
                                               class="collapsed" aria-expanded="false">修改地址</a>
                                        </h5>
                                    </div>
                                    <div id="my-account-3" class="panel-collapse collapse" style="">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>地址</h4>
                                                </div>
                                                <div class="entries-wrapper">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex align-items-center justify-content-center">
                                                            <div class="entries-info text-center">
                                                                <p>Seoul Sinlim of Korea </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex align-items-center justify-content-center">
                                                            <div class="entries-edit-delete text-center">
                                                                <a class="edit" href="#">编辑</a>
                                                                <a href="#">删除</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">

                                                    <div class="billing-btn">
                                                        <button type="submit">继续</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="section4" class="container-fluid bg-secondary" style="padding-top:108px;padding-bottom:70px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-form-wrapper">
                            <div class="section-title mb--30">
                                <h1 class="fontWeight400">联系我们</h1>
                            </div>
                            <!-- Start Contact Wrapper -->
                            <form class="contact__form--1" id="contact-form" action="contact.php" method="post">
                                <div class="row">
                                    <div class="col-lg-12 mt--20">
                                        <input name="con_name" type="text" placeholder="名字 *">
                                    </div>
                                    <div class="col-lg-6 mt--20">
                                        <input name="con_email" type="text" placeholder="邮箱 *">
                                    </div>
                                    <div class="col-lg-6 mt--20">
                                        <input name="con_phone" type="text" placeholder="电话 *">
                                    </div>
                                    <div class="col-lg-12 mt--20">
                                        <input name="con_inquiry" type="text" placeholder="询问类型 *">
                                    </div>
                                    <div class="col-lg-12 mt--20">
                                        <textarea name="con_message" placeholder="请您填上宝贵信息"></textarea>
                                    </div>
                                    <div class="col-lg-12 mt--30">
                                        <input type="submit" name="submit" value="Send Message">
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </form>
                            <!-- End Contact Wrapper -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-container adress__style--1">
                            <ul class="contact-address">
                                <li>
                                    <span class="address-icon"><i class="fa fa-phone-square"></i></span>
                                    <span class="address-text">18845780670</span>
                                </li>
                                <li>
                                    <span class="address-icon"><i class="fa fa-envelope"></i></span>
                                    <span class="address-text">dj2524480125@gmail.com</span>
                                </li>

                                <li>
                                    <span class="address-icon"><i class="fa fa-weixin"></i></span>
                                    <span class="address-text">dongjinghaha</span>
                                </li>

                                <li>
                                    <span class="address-icon"><i class="fa fa-map-marker"></i></span>
                                    <span class="address-text">Seoul Sinlim GuankGu of Korea
                                        </span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!----------------------------------Footer---------------------------------------------------->
<?php include("../home/footer.php"); ?>
</body
</html>
