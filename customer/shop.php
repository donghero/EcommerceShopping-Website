


<section class="new-products">
    <div class="container">
        <div class="title-box">
            <h2>New Arrivals</h2>
        </div>
        <div class="row">
<?php
//include ("conn.php");
$conn = mysqli_connect("localhost:3305","root","1234","dj");
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
                            <div class='col-md-3'>
                                <div class='product-top'>
                                    <a href='product.php?pro_id=$pro_id' class=''>
                                    <img src='../product_images/$pro_img1' alt='$pro_title'>
                                    </a>
                                    <div class='overlay-right'>
                                        <button type='button' class='btn btn-secondary' title='Qucik Shop'>
                                            <a href='product.php?pro_id=$pro_id' class=''>
                                            <i class='fa fa fa-eye'></i>
                                            </a>
                                        </button>
                                        
                                        <button type='button' class='btn btn-secondary' title='Add to Wishlist' onclick=''>
                                            <i class='fa fa fa-heart-o'></i>
                                        </button>
                                        
                                        <button type='button' class='btn btn-secondary' title='Add to cart' onclick=''>
                                            <i class='fa fa fa-shopping-cart'></i>
                                        </button>
                                    </div>
                                </div>
                                <div class='product-bottom text-center'>

                                    <h3>$pro_title</h3>
                                    <h5>￥$pro_price</h5>
                                </div>
                            </div>
                 ";
//    }
//}
    }
?>
        </div>
        </div>
</section>





<!--<div class="container">-->
<!--    <ul class="pagination justify-content-center">-->
<?php
//$query="select * from products ";
//$result=mysqli_query($conn,$query);
//$total_records=mysqli_num_rows($result);
//$total_pages=ceil($total_records/$per_page);
//                echo "
//                           <li class='page-item'>
//                                <a class='page-link'  href='../home/shop.php?page=1'>  " .'First Page'." </a>
//                           </li>
//                ";
//
//                for ($i=1;$i<=$total_pages;$i++){
//                echo "
//                           <li class='page-item'  >
//                                <a class='page-link' href='../home/shop.php?page=$i' > $i </a>
//                           </li>
//                 ";
//                }
//
//                echo "
//                           <li class='page-item'>
//                                <a class='page-link' href='../home/shop.php?page=$total_pages'>".'Last Page'."</a>
//                           </li>
//
//                ";
//
//?>
<!--</ul>-->
<!--</div>-->
