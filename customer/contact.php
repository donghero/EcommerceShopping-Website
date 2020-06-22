<?php
header("Content-type:text/html;charset=utf-8");
include("../functions/functions.php");
contact();
echo "
    <script>
    location.href='checkout.php';
    </script>";