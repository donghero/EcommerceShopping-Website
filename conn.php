<?php
$servername="localhost:3305";
$username="root";
$password="1234";
$dbname="dj";

//create connection
$conn=  mysqli_connect($servername,$username,$password,$dbname);

//check connection
if (!$conn){
    die("Connection failed:".mysqli_connect_error());
}
//echo "Connected successfully";

//UTF-8
mysqli_set_charset($conn,"UTF8");

//Error message
function Error($msg){
    echo"
    <script>
    window.alert('$msg');
    history.back();
</script>
    ";
    exit;
}

//cookie 获取user名
//function user(){
//    global $conn;
//    $temps=$_COOKIE['COOKIES'];
//    $COOKIE=explode("//","$temps");
//    $query = "select *from member where user='$COOKIE[0]'";
//    $result = mysqli_query($conn, $query);
//    $user = mysqli_fetch_array($result);
//    return $user;
//
//
//}

