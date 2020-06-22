<?php
header("Content-type:text/html;charset=utf-8");
include("../conn.php");
$user=$_POST['username'];
$pws=$_POST['password'];
$pw=md5($pws);              //md5()暗号化处理


$sql="select * from admin where user='$user' ";
$result=mysqli_query($conn,$sql);
$user=mysqli_fetch_array($result);

//登陆时比较
if (!$user){
    Error("아이디를 입력하세요");
}elseif (! $user['user'])
    Error("존재하지 않는 회원입니다. ");

if(!$pws){
    Error("비밀번호를 입력하세요");
}elseif($user['pw']!=$pw)
    Error("비밀번호가 같지 않습니다");

//设置cookie
if ($user['user']and $user['pw']==$pw) {
    $tmp = $user['user'] . '//' . $user['pw'];             // user和pw 用"//"分开之后存储在cookie
    setcookie("COOKIES", $tmp, time() + (60 * 60 * 24), "/");  //  "/'意思是存储路径
}

//转到主页
echo "
    <script>
    window.alert('로그인 되었습니다 ');
    location.href='index.php';
    </script>";



