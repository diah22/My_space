
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
        .login{
            box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
            padding:30px;
        }
        
        .home-page{
            display: grid;
            grid-template-columns: 40% 65%; 
            grid-template-rows: auto;
            grid-column-gap: 10px;
        }

        
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
    $response = $_GET['response'];
    // $response = json_decode($response);
    var_dump($response['message']);
    die;
    print_r($response['message']);
    include('../Utils/notif.php');
    // $response= $_GET['response'];
    // echo $response['state'];
    // Header('Location:../../index.php');
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