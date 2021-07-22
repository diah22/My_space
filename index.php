
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
    <div class="home-container">
        <ul class="topnav" style="height:50px">
            <li class="right"></li>
        </ul>
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
            
            </div>
        
    </div>
   
</body>
<script>
   
</script>
<!-- <script src="../../assets/js/modal.js"></script> -->
</html>