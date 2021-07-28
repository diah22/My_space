
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/default.css">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/utils.css">
    <link rel="stylesheet" href="../../assets/css/home.css">
    <style>
    </style>
    <title>Project</title>
</head>
<body>
<ul class="topnav" style="height:50px">
  <li class="right"></li>
</ul>

<?php 
if(isset($_GET['response']) && $_GET['response']!='')
{
    $data_response= json_decode($_GET['response']);
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
            <img src="../../assets/images/login.jpg">
        </div>
        <div class="home-c login">
            <form method="post" action="../../Controller/DefaultController/createuser.php">
                <div class="in-middle">
                <h4> Create account</h4>
                </div>
                
                <input type="text" name="username" class="input modal-content-container" placeholder="Username">
                <input type="text" name="email" class="input modal-content-container" placeholder="Email">
                <input type="password" name="password" class="input modal-content-container" placeholder="Password">
                <input type="password" name="confpass" class="input modal-content-container" placeholder="Confirm Password">
                <div class="in-middle mt-20">
                    <button class="bubbly-button btn-modal" type="submit">Signup</button>
                </div>
                <p>Have you already an account? Please<a href="../../index.php">Signin here</a></p>
            </form>
        </div>
    </div>
</div>
<div class="footer" id="footer">
    
</div>

</body>

<script>
   
</script>
<!-- <script src="../../assets/js/modal.js"></script> -->
</html>