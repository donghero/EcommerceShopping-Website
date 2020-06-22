<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>HomeShopping Single Product</title>
    <link rel="stylesheet" href="../styles/Css.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--    <script src="../js.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <style>
        .carousel-item img {
            width: 418px;
            height: 418px;
        }

        .carousel {
            width: 418px;

        }

        .thumb img {
            width: 60px;
            height: 60px;
            margin: 25px 5px 36px 5px;
        }

        .side-thumb img {
            width: 140px;
            height: 140px;

        }

        .container {
            margin: 0 165px 0 165px !important;
            /*width: 1190px !important;*/

        }

        .col-2 {
            padding: 0 3px 0 0 !important;
        }

        .col-md-5 {
            padding-left: 79px !important;
            padding-right: 0 !important;
        }

        .col-md-7 {
            padding-left: 85px !important;
        }

        .col-md-6 {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .col-md-6 p {
            margin-top: 5px

        }


        .thumb-left {
            padding: 0 5px 0 7px;
        }


        .btn-primary {
            width: 178px;
            height: 38px;
            margin-top: 10px;
            margin-right: 25px;
            background-color: orange !important;
        }


        p.look-price {
            margin-top: -18px;
            width: 90%;
            line-height: 19px;
            position: absolute;
            background-color: rgba(255, 255, 255, .8);
        }

        p.look-title {
            margin-bottom: 5px;
        }

        .sticky-top {
            top: 57px !important;
        }

        li.nav-item.col-md-3 {
            display: flex;
        }

        em.notice_count {
            margin: auto auto auto 1px;
            color: orange;
        }
    </style>
</head>

<?php
header("Content-type:text/html;charset=utf-8");
include("../conn.php");
if (isset($_GET['pro_id'])) {

    $product_id = $_GET['pro_id'];

    $get_product = "select * from products where p_no='$product_id'";

    $run_product = mysqli_query($conn, $get_product);

    $row_product = mysqli_fetch_array($run_product);

    $p_cat_id = $row_product['p_cat_id'];

    $pro_title = $row_product['product_title'];

    $pro_price = $row_product['product_price'];

    $pro_desc = $row_product['product_desc'];

    $pro_img1 = $row_product['product_img1'];

    $pro_img2 = $row_product['product_img2'];

    $pro_img3 = $row_product['product_img3'];

    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

    $run_p_cat = mysqli_query($conn, $get_p_cat);

    $row_p_cat = mysqli_fetch_array($run_p_cat);

    $p_cat_title = $row_p_cat['p_cat_title'];
    $get_cart = "select * from cart where p_id='$product_id'";
    $run_cart = mysqli_query($conn, $get_cart);
    $row_cart = mysqli_fetch_array($run_cart);
    $p_cart_quantity = $row_cart['quantity'];

}

?>


<!---------------------------------top-nav-bar------------------------------------------------>
<?php
include("../home/top-nav-bar.php");
//获取top-nav-bar.php里的functions.php中的user()函数
$user = user();
?>

<!---------------------------Single Product------------------------------------------>
<section class="single-product">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-5 ">
                        <div id="product-slider" class="carousel slide carousel-fade" data-ride="carousel">

                            <ul class="carousel-indicators">
                                <li data-target="#product-slider" data-slide-to="0" class="active"></li>
                                <li data-target="#product-slider" data-slide-to="1"></li>
                                <li data-target="#product-slider" data-slide-to="2"></li>
                                <li data-target="#product-slider" data-slide-to="3"></li>
                                <li data-target="#product-slider" data-slide-to="4"></li>
                            </ul>

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../product_images/<?php echo $pro_img1; ?>" class="d-block " alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="../product_images/<?php echo $pro_img2; ?>" class="d-block" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="../product_images/<?php echo $pro_img3; ?>" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="../product_images/<?php echo $pro_img2; ?>" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="../product_images/<?php echo $pro_img1; ?>" alt="...">
                                </div>
<!--                                <div class="carousel-item">-->
<!--                                    <img src="../product_images/idea.jpg" class="d-block" alt="...">-->
<!--                                </div>-->
                                <a class="carousel-control-prev" href="#product-slider" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#product-slider" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>


                        <div class="row">
                            <div class="thumb-left">
                                <div class="col-2">

                                    <a href="#product-slider" class="thumb" data-slide-to="0">
                                        <img src="../product_images/<?php echo $pro_img1; ?>" alt="product 1"
                                             class="rounded">
                                    </a>
                                </div>
                            </div>
                            <div class="thumb-left">
                                <div class="col-2">

                                    <a href="#product-slider" class="thumb" data-slide-to="1">
                                        <img src="../product_images/<?php echo $pro_img2; ?>" alt="product 1"
                                             class="rounded">
                                    </a>
                                </div>
                            </div>
                            <div class="thumb-left">
                                <div class="col-2">

                                    <a href="#product-slider" class="thumb" data-slide-to="2">
                                        <img src="../product_images/<?php echo $pro_img3; ?>" alt="product 1"
                                             class="rounded">
                                    </a>
                                </div>
                            </div>
                            <div class="thumb-left">
                                <div class="col-2">

                                    <a href="#product-slider" class="thumb" data-slide-to="3">
                                        <img src="../product_images/<?php echo $pro_img1; ?>" alt="product 1"
                                             class="rounded">
                                    </a>
                                </div>
                            </div>
                            <div class="thumb-left">
                                <div class="col-2">

                                    <a href="#product-slider" class="thumb" data-slide-to="4">
                                        <img src="../product_images/<?php echo $pro_img2; ?>" alt="product 1"
                                             class="rounded">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="middle">

                            <p class="new-arrival text-center">NEW</p>
                            <?php
                            //获取functions.php中的add_cart()函数
                            add_cart(); ?>
                            <form action="product.php?add_cart=<?php echo $product_id; ?>" method="post">
                                <h2><?php echo $pro_title; ?> </h2>
                                <p>商品编码：201622025061</p>
                                <p class="price">￥ <?php echo $pro_price; ?></p>
                                <p><b>Brand</b>In Stock</p>

                                <div class="row" style="border-top: dotted">
                                    <div class="col-md-6" style="border-right: dotted">
                                        <p class="text-center">月销量<em class="ml-2">(23,390)</em></p>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="text-center">累计评价<em class="ml-2">(23,390)</em></p>
                                    </div>
                                </div>


                                <div class="row ">
                                    <label class="col-md-6 control-label">数量</label>

                                    <div class="col-md-6">
                                        <button type="button" class="btn bg-light border rounded-circle"><i
                                                    class="fas fa fa-minus"></i></button>
                                        <input type="text" name="product_quantity" value="1" class="w-25 d-inline">
                                        <button type="button" class="btn bg-light border rounded-circle"><i
                                                    class="fas fa fa-plus"></i></button>
                                    </div>
                                </div>


                                <div class="row ">
                                    <label class="col-md-6 control-label">尺码</label>
                                    <select
                                            required
                                            name="product_size"
                                            class="col-md-6"
                                            oninput="setCustomValidity('')"
                                            oninvalid="setCustomValidity('Must pick 1 size for the product')"
                                    >
                                        <option disabled selected value="">select size</option>
                                        <option>Small</option>
                                        <option>Medium</option>
                                        <option>Large</option>
                                    </select>
                                </div>

                                <div class="button text-center">
                                    <button type="submit" class="btn btn-primary col-md-6">Buy Now</button>
                                    <button type="submit" class="btn btn-primary col-md-6">Add to Cart</button>
                                    <!--                                <button class="btn  "> Add to cart</button>-->
                                    <!--                                 <button class="btn ">Buy Now</button>-->
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="row text-center">
                    <div class="col-md-12 show-title">
                        <span>看一看</span>
                    </div>
                    <?php
                    $random_product = "select * from products order by rand() limit 0,3";
                    $random_run = mysqli_query($conn, $random_product);
                    while ($row_random = mysqli_fetch_array($random_run)) {
                        $pro_id = $row_random['p_no'];
                        $random_image1 = $row_random['product_img1'];
                        $random_title = $row_random['product_title'];
                        $random_price = $row_random['product_price'];

                        echo "
                         <div class='col-md-12'>
                                <a href='product.php?pro_id=$pro_id' class='side-thumb'>
                                    <img src='../product_images/$random_image1' alt='$random_title' >
                                </a>
                                <p class=\"look-price\">￥$random_price</p>
                                <p class=\"look-title\">$random_title</p>
                        </div>


                    ";
                    } ?>


                </div>
            </div>
        </div>
    </div>
</section>
<!---------------------------Product-description------------------------------------->
<section class="product-description">

    <body data-spy="scroll" data-target=".navbar" data-offset="50">

    <nav class="container navbar navbar-expand-sm bg-dark navbar-dark sticky-top">

        <ul class="navbar-nav container-fluid">
            <li class="nav-item col-md-3">
                <a class="nav-link" href="#section1">商品详情</a>
            </li>
            <li class="nav-item col-md-3">
                <a class="nav-link" href="#section2">商品详情</a>
                <em class="notice_count">(23,390)</em>
            </li>
            <li class="nav-item col-md-3">
                <a class="nav-link" href="#section3">Q&A</a>
                <em class="notice_count">(23,390)</em>
            </li>
            <li class="nav-item col-md-3">
                <a class="nav-link" href="#section4">店铺信息</a>
            </li>

        </ul>

    </nav>

    <div id="section1" class="container mt-5" style="padding-top:108px;padding-bottom:70px">
        <div class="mt-5">
            <table class="table">
                <thead class="thead-light">
                <th>商品状态</th>
                <td>New</td>
                <th>支持的快递</th>
                <td>顺丰</td>
                </thead>
                <thead class="thead-light">
                <th>商品编号</th>
                <td>201622025061</td>
                <th>发票</th>
                <td>20</td>
                </thead>
                <thead class="thead-light">
                <th>发票</th>
                <td>201622025061</td>
                <th>品牌</th>
                <td>Dj</td>
                </thead>
                <thead class="thead-light">
                <th>成分</th>
                <td>棉100%</td>
                <th>保修</th>
                <td>2年</td>
                </thead>
                <thead class="thead-light">
                <th>产地</th>
                <td>中国</td>
                </thead>

            </table>
        </div>

    </div>
    <div id="section2" class="container bg-secondary" style="padding-top:108px;padding-bottom:70px">
        <div class="container">
            <img src="../images/product1.jpg">
            <img src="../images/product2.jpg">
            <img src="../images/product3.jpg">

        </div>

    </div>
    <div id="section3" class="container " style="padding-top:108px;padding-bottom:70px">
        <h1 class="mt-5">Q&A</h1>

    </div>
    <div id="section4" class="container " style="padding-top:108px;padding-bottom:70px">
        <div class="mt-5">
            <table class="table">
                <thead class="thead-dark">
                <th>店铺名称</th>
                <td class="">哈尔滨商业大学郑东京</td>
                </thead>
                <thead class="thead-dark">
                <th>客户电话</th>
                <td class="">18845780670</td>
                </thead>
                <thead class="thead-dark">
                <th style="padding-bottom: 30px;">退款流程</th>
                <td class="">一、已支付的订单商品若发生退货，在退货商品送达我司仓库后，款项将默认以原支付方式退回<br>
                    二、对于信用卡支付的订单，退款周期可能较长，但通常不会超过30天，实际退款日期以银行为准<br>
                    三、为保护账户安全，网上支付及货到刷卡的退款，均会按照原支付卡原路返回
                </td>
                </thead>
            </table>
        </div>

    </div>


    <hr>

    <div class="container">
        <div class="title-box">
            <h2>相似商品</h2>
        </div>
        <div class="row">
            <?php
            $random_product = "select * from products order by rand() limit 0,4";
            $random_run = mysqli_query($conn, $random_product);
            while ($row_random = mysqli_fetch_array($random_run)) {
                $pro_id = $row_random['p_no'];
                $random_image1 = $row_random['product_img1'];
                $random_title = $row_random['product_title'];
                $random_price = $row_random['product_price'];

                echo "
                            <div class='col-md-3'>
                <div class='product-top'>
                  <a href='product.php?pro_id=$pro_id'>
                    <img src='../product_images/$random_image1' alt='$pro_title'>
                  </a>
                    <div class='overlay-right'>
                        <button type='button' class='btn btn-secondary' title='Qucik Shop'>
                            <i class='fa fa fa-eye'></i>
                        </button>
                        <button type='button' class='btn btn-secondary' title='Add to Wishlist'>
                            <i class='fa fa fa-heart-o'></i>
                        </button>
                        <button type='button' class='btn btn-secondary' title='Add to cart'>
                            <i class='fa fa fa-shopping-cart'></i>
                        </button>
                    </div>
                </div>
                <div class='product-bottom text-center'>
                    <h3>$random_title</h3>
                    <h5>￥$random_price</h5>
                </div>
            </div>
                
                ";
            }
            ?>

        </div>
    </div>
</section>

<!---------------------------Footer-------------------------------------------------->
<?php
include("../home/footer.php");
?>
<script>
    //plus ,minus button
    $('div button i.fa-plus').parent().click(function () {
        let last_value = $(this).parent().children("input").val();
        last_value++;
        $(this).parent().children("input").val(last_value);
    });
    $('div button i.fa-minus').parent().click(function () {
        let last_value = $(this).parent().children("input").val();
        if (last_value <= 1) return;
        last_value--;
        $(this).parent().children("input").val(last_value);
    });
</script>

</html>