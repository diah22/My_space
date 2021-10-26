<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="assets/css/signin.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/utils.css">
    <style>
    </style>
    <title> MySpace </title>
</head>
<body>
<?php 
            if(isset($_GET['auth-error']) && $_GET['auth-error']!='')
            {
                $data_response= json_decode($_GET['auth-error']);
                // var_dump($data_response -> state);
                // die;
                // print_r($data_response -> state);
                // print_r($data_response -> state);    ✔ ⋯ ☓ … ╳
                ?>
                <div id="toast" class="<?php echo $data_response -> state; ?>">
                    <div id="img">✔</div>
                    <div id="desc">
                        <?php  echo $data_response -> message; ?>
                    </div>
                </div>
                <?php
            }
            ?>

<!-- <button onclick="launch_toast()">Show Toast</button> -->
<div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="post" action="Controller/UserController/createUser.php">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" class="input" name="username" placeholder="Username" />
                <input type="email" class="input" name="email" placeholder="Email" />
                <input type="password" class="input" name="password" placeholder="Password" />
                <input type="password" class="input" name="confpass" placeholder="Confirm Password" />
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="Controller/SecurityController/getAllUser.php" method="post">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input class="input" type="text" placeholder="Username" name="username"/>
                <input class="input" type="password" placeholder="Password" name="password"/>
                <a href="#">Forgot your password?</a>
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome to MySpace!</h1>
                    <p>Login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>You don't have any account ? </h1>
                    <p>Let'create a new account</a></p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
</script>
<script src="assets/js/utils.js"></script>
</html>