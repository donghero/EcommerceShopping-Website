
<?php
header("Content-type:text/html;charset=utf-8");
//include("conn.php");
include("../functions/functions.php");
//获取conn.php中的user()函数
$user=user();
?>




<div class="top-nav-bar">
    <div class="search-box">
        <i class="fas fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
        <i class="fas fa fa-times" id="close-btn" onclick="closemenu()"></i>
        <a href="../customer/homeshopping.php">
        <img src="../images/dj.ico" class="logo">
        </a>
        <input type="text" class="form-control" >
        <span class="input-group-text"><i class="fas fa fa-search"></i></span>
    </div>
    <div class="menu-bar">
        <ul>
            <li class="no_color">
            <?php
            if($user['user']){
                echo "欢迎".$user['user'];
                ?>
            </li>
                <li>
                        <a href="../customer/cart.php" target="_blank">
                        <span id="cart_count" class="dot"><?php items();?></span>
                        <i class="fas fa fa-shopping-basket"></i>Cart
                        </a>
                </li>
                <li ><a href="../customer/logout.php">Log Out</a> </li>


                <?php
            }else{
                ?>
                <li><a href="../customer/register.php">Sign Up</a> </li>
                <li><a href="../customer/login.php">Log In</a> </li>
                <li><a href=""><i class="fas fa fa-shopping-basket"></i>Cart</a> </li>

            <?php }?>

        </ul>
    </div>
</div>


