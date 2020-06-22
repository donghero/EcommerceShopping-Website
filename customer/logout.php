<?php
header("Content-type:text/html;charset=utf-8");
$delete=setcookie("COOKIES", "" ,0, "/");  // 删除 cookie

echo "
<script>
    window.alert('로그아웃 되었습니다 ');
    location.href='homeshopping.php';
</script>";
