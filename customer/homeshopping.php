<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HomeShopping</title>
    <link rel="stylesheet" href="../styles/Css.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>


</head>
<body>
<?php include("../conn.php") ?>
<!---------------------------------top-nav-bar------------------------------------------------>
<?php include("../home/top-nav-bar.php") ?>
<!---------------------------------header----------------------------------------------------->
<?php include("../home/header.php") ?>
<!---------------------------------featured-categories---------------------------------------->
<?php include("../home/featured-categories.php") ?>
<!---------------------------------On Sale Product-------------------------------------------->
<?php include("../home/on-sale.php") ?>
<!---------------------------------New Products----------------------------------------------->
<?php include("../home/shop.php") ?>
<!---------------------------------Website features------------------------------------------>
<?php include("../home/website-features.php") ?>
<!----------------------------------Footer---------------------------------------------------->
<?php include("../home/footer.php"); ?>
</body>
</html>
