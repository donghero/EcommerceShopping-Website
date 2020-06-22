
<?php
header("Content-type:text/html;charset=utf-8");
include("conn.php");

if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pws = $_POST['password'];
    $pws2 = $_POST['password2'];

    $pw = md5($pws);            //md5()暗号化处理
    $pw2 = md5($pws2);
}

//user 比较
if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $user)){
    Error("错误：用户名不符合规定 ");
}
//    if ($member=' ')
//        Error("아이디를 입력하세요");
//    if ($member = substr($member, "12"))
//        Error("회원아이디는 12자 까지만 허용됩니다");


//检测用户名是否已经存在
$check_query = mysqli_query($conn,"select * from member where user='$user' limit 1");
if(mysqli_fetch_array($check_query)){
    Error("此用户已存在!");
}


//pw 比较
    if (!$pws)
        Error("비밀번호를 입력하세요");
    if (strlen($pws) < 8 or strlen($pws) > 15)
        Error("비밀번호는 8-15자 까지만 허용됩니다");
    if (!$pws2)
        Error("확인 비밀번호를 입력하세요");
    if (!($pw == $pw2))
        Error("비밀번호가 일치 하지 않습니다.");
    if (preg_match("/[^a-z 0-9A-Z]/", $pw)) {
        Error("아이디는 영어문자와 숫자만 가능합니다.");
    }


//注册信息添加到数据库
$insert="insert  into member(user, email, pw ) values ('$user','$email','$pw')";

$insert_query=mysqli_query($conn,$insert);
//mysqli_close($conn);

if ($insert_query) {
    echo  "<script>window.alert('注册成功')</script>";
}else{
    echo  "<script>window.alert('注册失败')</script>";
}




