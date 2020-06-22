<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HomeShopping</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/Css.css">
    <link rel="stylesheet" href="../styles/left_sidebar.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>

<body data-gr-c-s-loaded="true">

<?php include("../conn.php") ?>
<!---------------------------------top-nav-bar------------------------------------------------>
<?php include("../home/top-nav-bar.php") ?>


<div class="main-wrapper">

    <!-- Start Shop Area -->
    <div class="shop-area bg-color ptb--120 ptb_md--80 ptb_sm--80" data-bg-color="#ffffff"
         style="background-color: rgb(255, 255, 255);">
        <div class="container-fluid">
            <div class="row">
                <div class="order-2 order-lg-1 col-lg-3 mt_md--60 mt_sm--60">
                    <!-- Start Sidebar Area -->
                    <div class="shop-sidebar-container">
                        <div class="shop-sidebar-wrapper">
                            <!-- Start Single Widget -->
                            <nav class="shop-sidebar search ">
                                <h5 class="widget-title">搜索</h5>
                            </nav>
                            <!-- End Single Widget -->

                            <!-- Start Single Widget -->
                            <div class="shop-sidebar related-product-inner mt--50">
                                <h3 class="widget-title">相关商品</h3>
                                <ul class="related-product">

									<?php
									$random_product = "select * from products order by rand() limit 0,5";
									$random_run = mysqli_query($conn, $random_product);
									while ($row_random = mysqli_fetch_array($random_run)) {
										$pro_id = $row_random['p_no'];
										$random_image1 = $row_random['product_img1'];
										$random_title = $row_random['product_title'];
										$random_price = $row_random['product_price'];
										echo "
                                              <li>
                                        <div class=\"product-item\">
                                            <div class=\"thumbnail\">
                                                <a href=\"product.php?pro_id=$pro_id\">
                                                    <img src=\"../product_images/$random_image1\" alt=\"multi-purpose\">
                                                </a>
                                            </div>
                                            <div class=\"info\">
                                                <h5 class=\"heading heading-h5\"><a href=\"product . php ? pro_id = $pro_id\">$random_title</a></h5>
                                                <div class=\"price\"><span class=\"new-price\">￥$random_price</span></div>
                                            </div>
                                        </div>
                                    </li>
                                            ";
									}
									?>


                                </ul>
                            </div>
                            <!-- End Single Widget -->


                        </div>
                    </div>
                    <!-- End Sidebar Area -->
                </div>
                <div class="order-1 order-lg-2 col-lg-9">
                    <div class="archive-shop-actions mb--30">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="archive-shop-inner text-center text-sm-left">
                                    <p class="bk_pra">DJ 强烈推荐</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="archive-shop-inner text-center text-sm-right mt_mobile--20">
                                    <select>
                                        <option>热度</option>
                                        <option>平均</option>
                                        <option>价格 低-高</option>
                                        <option>价格 高-低</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Shop Minimal Product -->
                    <div class="shop-minimal-product">
                        <div class="row row--25">
							<?php
							//include ("conn.php");
							$conn = mysqli_connect("localhost:3305", "root", "1234", "dj");
							//if(!isset($_GET['p_cat'])){
							//
							//if(!isset($_GET['cat'])) {
							$per_page = 8;
							if (isset($_GET['page'])) {
								$page = $_GET['page'];
							} else {
								$page = 1;
							}
							$start_from = ($page - 1) * $per_page;

							$get_products = "select * from products  order by p_no desc limit $start_from,$per_page";
							$run_products = mysqli_query($conn, $get_products);

							while ($row_products = mysqli_fetch_array($run_products)) {
								$pro_id = $row_products['p_no'];

								$pro_title = $row_products['product_title'];

								$pro_price = $row_products['product_price'];

								$pro_img1 = $row_products['product_img1'];

								echo "
                                <!-- Start Single Product -->
                            <div class='col-lg-3 col-md-6 col-sm-6 col-12 mt--60'>
                                <div class='product'>
                                    <div class='inner'>
                                        <div class='thumbnail'>
                                            <a href='product.php?pro_id=$pro_id'>
                                                <img src='../product_images/$pro_img1' alt='$pro_title'>
                                            </a>
                                        </div>
                                        <div class='product-hover-action'>
                                            <div class='hover-inner'>
                                                <a title='Quick View' class='quickview' href='#'><i class='fa fa-search'></i></a>
                                                <a href='cart.html'><i class='fa fa-cart-plus'></i></a>
                                                <a href='wishlist.html'><i class='fa fa-heart-o'></i></a>
                                                <a href='compare.html'><i class='fa fa-repeat'></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='content'>
                                        <h2><a href='product-details.html'>$pro_title</a></h2>
                                        <span class='prize'>$pro_price</span>
                                    </div>
                                </div>
                            </div>
                          ";
							}
							?>
                            <!-- End Single Product -->


                            <!-- Start Pagenation Area -->
                            <div class="col-lg-12 mt-4">
                                <ul class="pagination justify-content-center">
									<?php
									$query = "select * from products ";
									$result = mysqli_query($conn, $query);
									$total_records = mysqli_num_rows($result);
									$total_pages = ceil($total_records / $per_page);
									echo "
                           <li class='page-item'>
                                <a class='page-link'  href='left_sidebar.php?page=1'>  " . 'First Page' . " </a>
                           </li>
                ";

									for ($i = 1; $i <= $total_pages; $i++) {
										echo "
                           <li class='page-item'  >
                                <a class='page-link' href='left_sidebar.php?page=$i' > $i </a>
                           </li>
                 ";
									}

									echo "
                           <li class='page-item'>
                                <a class='page-link' href='left_sidebar.php?page=$total_pages'>" . 'Last Page' . "</a>
                           </li>

                ";

									?>
                                </ul>
                            </div>
                            <!-- End Pagenation Area -->

                        </div>
                    </div>
                    <!-- End Shop Minimal Product -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Area -->
</div>

<!----------------------------------Footer---------------------------------------------------->
<?php include("../home/footer.php"); ?>


</body>