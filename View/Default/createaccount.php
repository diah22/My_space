<?php 
if(isset($_GET['response']) && $_GET['response']!='')
{
    $response= $_GET['response'];
    echo $response['state'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/default.css">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/utils.css">
    <style>
        .login{
            box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
            min-width:56%;
            min-height:50%;
            padding:30px;
        }
        
    </style>
    <title>Project</title>
</head>
<body>
<ul class="topnav" style="height:50px">
 
  <li class="right"></li>
 
</ul>


    <!-- <div class="content">
        <div class="row home-page">
        <div class="image-content">
            <img src="../../assets/images/login.jpg">
            </div>
            <div class="login">
                <form method="post" action="../../Controller/DefaultController/createuser.php">
                    <h4>Create account</h4>
                    <input type="text" name="username" class="input modal-content-container" placeholder="Username">
                    <input type="text" name="email" class="input modal-content-container" placeholder="Email">
                    <input type="password" name="pass1" class="input modal-content-container" placeholder="Password">
                    <input type="password" name="pass2" class="input modal-content-container" placeholder="Confirm password">
                <button class="bubbly-button btn-modal" name="createuser" type="submit">Signup</button>
                </form>
                <p>Have you already an account? Please<a href="index.php">signin here</a></p>
            </div>
        <div>
    </div> -->

    <div class="content">
            <div class="row home-page">
                <div class="image-content">
                    <img src="../../assets/images/login.jpg">
                </div>
                <div class="login" style="margin-left:110px">
                    <form method="post" action="../../Controller/DefaultController/createuser.php">
                        <div class="in-middle">
                        <h4> Create account</h4>
                        </div>
                       
                        <input type="text" name="username" class="input modal-content-container" placeholder="Username">
                        <input type="text" name="email" class="input modal-content-container" placeholder="Email">
                        <input type="text" name="password" class="input modal-content-container" placeholder="Password">
                        <input type="text" name="confpass" class="input modal-content-container" placeholder="Confirm Password">
                        <div class="in-middle mt-20">
                            <button class="bubbly-button btn-modal" type="submit">Signup</button>
                        </div>
                        <p>Have you already an account? Please<a href="../../index.php">Signin here</a></p>
                    </form>
        
                </div>
            </div>
        </div>
        <div class="footer">
            
        </div>
    
</body>

<script>
   
</script>
<!-- <script src="../../assets/js/modal.js"></script> -->
</html>