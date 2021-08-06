
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/utils.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <style>
        
    </style>
    <title>Project</title>
</head>
<body>
    <div class="home-container">
        <ul class="topnav" style="height:50px">
            <li class="right"></li>
        </ul>
        <?php 
            if(isset($_GET['auth-error']) && $_GET['auth-error']!='')
            {
                $data_response= json_decode($_GET['auth-error']);
                // var_dump($data_response -> state);
                // die;
                // print_r($data_response -> state);    
                ?>
                <div class="notification <?php echo $data_response -> state; ?>">
                ✔ ⋯ ☓ … ╳<?php echo $data_response -> message; ?>
                <div>
                <?php
            }
            ?>
        <div class="content">
            <div class="home-page">
                <div class="home-c image-content">
                    <img src="assets/images/login.jpg">
                </div>
                <div class="home-c login">
                    <form method="post" action="Controller/DefaultController/getAllUser.php">
                    <div class="in-middle">
                        <h4> Signin</h4>
                    </div>
                        <input type="text" name="username" class="input modal-content-container" placeholder="Username">
                        <input type="password" name="password" class="input modal-content-container" placeholder="Password">
                        <div class="in-middle mt-30">
                            <button class="bubbly-button btn-modal" type="submit">Signin</button>
                        </div>
                        
                        <p>You don't have any account ? <a href="View/Default/createaccount.php">Let'create a new account</a></p>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer" id="footer">
            <p>
                <a href="https://diam-wit.com">diam-wit.com</a> est hébergé par <a href="https://www.simafri.com/fr/hebergement-web-gratuit/">Simafri</a>
                <img alt="logo-simafri" class="logo" src="assets/images/simafri.png">
            </p>    
           
        </div>   
    </div>
  
   
</body>
<script>
   
</script>
<!-- <script src="../../assets/js/modal.js"></script> -->
</html>