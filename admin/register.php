
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>register</title>
    <link rel="stylesheet" href="../styles/register.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js.js"></script>
<style>
</style>

</head>
<body>
<form action="register_post.php" method="post">
<div id="login-box">
    <div class="left">
        <h1>Sign up</h1>

            <div class="input-box">
            <input type="text" name="username" placeholder="User"/>
            </div>

            <div class="input-box">
            <input type="text" name="email" placeholder="E-mail" />
            </div>

            <div class="input-box">
                <div class="text_div">
                    <input type="password" id="password" name="password" placeholder="Password" />
                </div>
                <div class="icon">
                <i id="hide1" class="fa fa-eye-slash" aria-hidden="true" onclick="show_password()"></i>
                <i id="hide2" class="fa fa-eye" aria-hidden="true"  onclick="show_password()"></i>
                </div>
             </div>


        <div class="input-box">
            <div class="text_div">
                <input type="password" id="password2" name="password2" placeholder="Conform Password" />
            </div>
            <div class="icon">
                <i id="hide1_1" class="fa fa-eye-slash" aria-hidden="true" onclick="show_password2()"></i>
                <i id="hide2_2" class="fa fa-eye" aria-hidden="true"  onclick="show_password2()"></i>
            </div>
        </div>

        <input type="submit" name="submit" value="Sign me up" />

    </div>
</form>

    <div class="right">
        <span class="loginwith">Sign in with<br />social network</span>

        <button class="social-signin facebook">Log in with facebook</button>
        <button class="social-signin twitter">Log in with Twitter</button>
        <button class="social-signin google">Log in with Google+</button>
    </div>
    <div class="or">OR</div>

</body>
</html>

