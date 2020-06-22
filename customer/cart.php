<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HomeShopping</title>
    <link rel="stylesheet" href="../styles/Css.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/cart.css">
    <script src="../js.js " defer="defer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include("../home/top-nav-bar.php") ?>
<?php //include ("functions.php");?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>我的购物车</h6>
                <hr>

				<?php
				$total = 0;
				$sub_total = 0;

				$ip_add = getRealIpUser();

				$select_cart = "select * from cart where ip_add='$ip_add'";

				$run_cart = mysqli_query($conn, $select_cart);

				while ($row_cart = mysqli_fetch_array($run_cart)) {

					$pro_id = $row_cart['p_id'];

					$pro_size = $row_cart['size'];

					$pro_quantity = $row_cart['quantity'];

					$get_products = "select * from products where p_no='$pro_id'";

					$run_products = mysqli_query($conn, $get_products);

					while ($row_products = mysqli_fetch_array($run_products)) {

						$product_title = $row_products['product_title'];

						$product_img1 = $row_products['product_img1'];

						$only_price = $row_products['product_price'];

						$sub_total = $row_products['product_price'] * $pro_quantity;

						$total += $sub_total;
						?>
                        <form action="cart.php" method="post" class="cart-items">
                            <div class="border rounded">
                                <div class="row bg-white">
                                    <div class="col-md-3 pl-0">
                                        <img src="../product_images/<?php echo $product_img1; ?>" alt="Image1"
                                             class="img-fluid">
                                    </div>

                                    <div class="col-md-9 ">
                                        <h5 class="pt-2"><?php echo $product_title; ?></h5>
                                        <small class="text-secondary">Seller: dailytuition</small>
                                        <h5 class="pt-2"><?php echo "￥" . $only_price; ?></h5>
                                        <button type="button" class="btn btn-warning mt-4" id="save"
                                                value="<?php echo $pro_id; ?>">更改数量
                                        </button>
                                        <button type="button" class="btn btn-danger mx-2 mt-4 " id="remove"
                                                value="<?php echo $pro_id; ?>" data-toggle="modal"
                                                data-target="#delete">删除宝贝
                                        </button>

                                        <button type="button" class="btn bg-light border rounded-circle ml-5 mb-1 "
                                                id="minus"><i class="fas fa fa-minus"></i></button>
                                        <input type="text" id="plus_minus_quantity" value="<?php echo $pro_quantity ?>"
                                               class="form-controls w-25 d-inline ">
                                        <button type="button" class="btn bg-light border rounded-circle mb-1" id="plus">
                                            <i class="fas fa fa-plus"></i></button>
                                    </div>

                                </div>
                            </div>
                        </form>


					<?php }
				} ?>

            </div>
        </div>


        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25 sticky-top">

            <div class="pt-4">
                <h6>价格明细</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
						<?php

						$ip_add = getRealIpUser();

						$select_cart = "select * from cart where ip_add='$ip_add'";

						$run_cart = mysqli_query($conn, $select_cart);

						$count = mysqli_num_rows($run_cart);

						$user = user();
						$cookie_user = $user['user'];


						?>
                        <h6>已选商品 <?php echo "($count 件)" ?></h6>
                        <h6>优惠券</h6>
                        <hr>
                        <h6>合计</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>￥<?php echo $sub_total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>￥<?php echo $total; ?></h6>
                    </div>
                    <div class="col-md-12 text-center display-4 mb-2 ">
                        <button type="button" class="col-md-12 btn btn-primary" data-toggle="modal"
                                data-target="#check">结算
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <!--        <div class="col-md-12 text-center">-->
        <!--            <button type="submit" name="update" value="Update Cart" class="btn btn-default">-->
        <!---->
        <!--                <i class="fa fa-refresh"></i> Update Cart-->
        <!---->
        <!--            </button>-->
        <!---->
        <!---->
        <!--        </div>-->
    </div>
</div>

</div>

<?php include "../home/footer.php" ?>

<!--------------------remove button modal ---------------------->
<div id="delete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <p>确定删除此宝贝吗？</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_delete_record">删除</button>
            </div>

        </div>
    </div>
</div>

<!--------------------check button modal ---------------------->
<div id="check" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <p>确定购买宝贝吗？</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn_close_record"
                        value="<?php echo $cookie_user ?>">取消
                </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn_buy_record"
                        value="<?php echo $cookie_user ?>">购买
                </button>
            </div>

        </div>
    </div>
</div>


</body>
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


    //(remove button)delete data
    $(document).ready(function () {
        $(document).on('click', '#remove', function () {
            let id = $(this).attr("value");
            // console.log("id");
            $('#delete').modal('show');
            $(document).on('click', '#btn_delete_record', function () {
                $.ajax({
                    url: "../delete.php",
                    type: "POST",
                    data: {
                        p_id: id
                    },
                    success: function (data) {
                        alert(data);
                        location.reload();
                    }
                });
            });
        });
    });

    //click save button cant get related value when click add/remove button
    $(document).ready(function () {
        $(document).on('click', '#save', function () {
            let value = $(this).siblings('#plus_minus_quantity').val();
            let id = $(this).attr("value");
            // console.log(value);
            // alert(value);
            $.ajax({
                url: "../btn_plus.php",
                type: "post",
                data: {
                    value: value,
                    id: id
                },
                success: function (data) {
                    alert(data);
                    location.reload();
                }
            })
        });

    });

    //confirm buying products
    $(document).ready(function () {
        $('#btn_buy_record').click(function () {
            let username = $('#btn_buy_record').attr("value");
            $.ajax({
                url: "../buy.php",
                type: "POST",
                data: {
                    username: username
                },
                success: function (data) {
                    alert("购买成功");
                    location.href = "checkout.php";
                }
            });
        });
    });

    //confirm buying products
    $(document).ready(function () {
        $('#btn_close_record').click(function () {
            let username = $('#btn_close_record').attr("value");
            $.ajax({
                url: "../close.php",
                type: "POST",
                data: {
                    username: username
                },
                success: function (data) {
                    alert("取消购买");
                    location.href = "checkout.php";
                }
            });
        });
    });
</script>
</html>


