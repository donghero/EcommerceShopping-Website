<html>
<head>
<title>Login Form Design</title>
    <link rel="stylesheet"  href="../styles/login.css">

</head>
<body>
<form action="login_post.php" method="post">
    <div class="loginbox">
    <img src="../images/banner1.png" class="avatar">
        <h1>Login Here</h1>
        <form>
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="login_submit" value="Login">
            <a href="#">Lost your password?</a><br>
            <a href="#">Don't have an account?</a>
        </form>
        
    </div>
</form>
</body>
</html>
