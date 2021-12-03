<?php
   session_start();
    //    $userId= 2;
   $userId= $_GET['userid'];
   $_SESSION['user'] = $userId;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../assets/css/index.css" rel="stylesheet" />
    <link href="../../assets/css/default.css" rel="stylesheet" />
    <link href="../../assets/css/navbar.css" rel="stylesheet" />
    <title>Task</title>
<!--

Comparto TemplateMo

https://templatemo.com/tm-544-comparto

-->
</head>

<body>
    <div class="container-fluid">
        <div class="tm-site-header tm-mb-1">
            <?php include_once "navbar.php" ?>
            <div class="navbar-item-current">
            <div class="navbar-box">
                <div class="navbar-menu">
                <a id="dashboard" href="" data-user=<?php $_SESSION['user'] ?>>
                <div class="menu-pic">
                    <img alt="dashboard" src="../../assets/icons/strategy.png">
                </div>
                <div class="menu-name">
                    Dashboard
                </div>
                </a>
                </div>
            </div>
            </div>
         
            <div class="navbar-item">
              <div class="navbar-box">
                  <div class="navbar-menu">
                    <a href="../Task/index.php">
                      <div class="menu-pic">
                        <img alt="task" src="../../assets/icons/time.png">
                      </div>
                      <div class="menu-name">
                        Task
                      </div>
                    </a>
                  </div>
              </div>
            </div>
            <div class="navbar-item">
              <div class="navbar-box">
                  <div class="navbar-menu">
                    <a href="../Project/index.php">
                      <div class="menu-pic">
                        <img alt="project" src="../../assets/icons/project.png">
                      </div>
                      <div class="menu-name">
                        Project
                      </div>
                    </a>
                  </div>
              </div>
            </div>
            <div class="navbar-item">
              <div class="navbar-box">
                  <div class="navbar-menu">
                    <a href="../Event/index.php">
                      <div class="menu-pic">
                        <img alt="event" src="../../assets/icons/event.png">
                      </div>
                      <div class="menu-name">
                        Event
                      </div>
                    </a>
                  </div>
              </div>
            </div>
            <div class="navbar-item">
              <div class="navbar-box">
                  <div class="navbar-menu">
                  <div class="menu-pic">
                        <img alt="an image here">
                    </div>
                    <a href="#link">More</a>
                  </div>
              </div>
            </div>
        </div>
        <section class="tm-mb-1" id="about">
            <div class="tm-row tm-about-row">
                <div class="tm-section-1-s">
                    <img src="img/comparto-image-01.jpg" alt="About image" class="tm-img-responsive">
                </div>
                <article class="tm-section-1-r tm-bg-color-8">
                    <h2 class="tm-mb-2 tm-title-color">To-do List</h2>
                    <p><a rel="nofollow" href="https://templatemo.com/tm-544-comparto" target="_parent">Comparto</a> is a custom light-weight CSS layout for your website. You can easily adapt and use this for your commercial or personal websites. Feel free to use it.</p>
                    <p>You cannot redistribute this template ZIP file in any template collection website. Please <a rel="nofollow" href="https://templatemo.com/contact" target="_parent">contact TemplateMo</a> if you have any question.</p>
                    <p>Nunc sed gravida elit. Curabitur rutrum elit id lobortis viverra. Fusce at libero dui.</p>
                    
                    <a href="#services" class="tm-btn tm-btn-1 tm-link-to-services">More Detail</a>
                </article>
            </div>
        </section>
        <div class="tm-bg-color-1 tm-mb-1 tm-social-row">
            <h2 class="tm-text-white tm-contact-title">Upcoming events</h2>
            <div class="tm-row">
                <div class="tm-icon">
                    <div class="tm-icon-inner">
                        <a href="#services">
                            <i class="fas fa-synagogue fa-4x tm-mb-1"></i>
                            <p>Aenean vel est id massa condimentum</p>
                        </a>
                    </div>
                </div>
                <div class="tm-icon">
                    <div class="tm-icon-inner">
                        <a href="#gallery">
                            <i class="fas fa-chart-bar fa-4x tm-mb-1"></i>
                            <p>Suspendisse interdum lectus purus</p>
                        </a>
                    </div>
                </div>
                <div class="tm-icon">
                    <div class="tm-icon-inner">
                        <a href="#contact">
                            <i class="fas fa-images fa-4x tm-mb-1"></i>
                            <p>Nulla ac sodales est vel iaculis purus</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <section id="contact" class="tm-bg-color-5 tm-mb-3">
            <h2 class="tm-text-white tm-contact-title">Recent Project</h2>
            <div class="tm-bg-color-white tm-contact-main">

                <div class="contact-info-outer">
                    <div class="tm-bg-color-6 contact-info">
                        <p>Pellentesque egestas odio sed tellus dictum, vel lobortis ante vehicula.</p>
                        <p>Morbi eget accumsan libero, non tincidunt felis.</p>
                        <p class="tm-mb-0">Tel: <a href="tel:0100200990">010-020-0990</a></p>
                        <p>Email: <a href="mailto:info@company.com">info@company.com</a></p>
                    </div>
                </div>
                <div class="contact-info-outer">
                    <div class="tm-bg-color-6 contact-info">
                        <p>Pellentesque egestas odio sed tellus dictum, vel lobortis ante vehicula.</p>
                        <p>Morbi eget accumsan libero, non tincidunt felis.</p>
                        <p class="tm-mb-0">Tel: <a href="tel:0100200990">010-020-0990</a></p>
                        <p>Email: <a href="mailto:info@company.com">info@company.com</a></p>
                    </div>
                </div>
                <div class="contact-info-outer">
                    <div class="tm-bg-color-6 contact-info">
                        <p>Pellentesque egestas odio sed tellus dictum, vel lobortis ante vehicula.</p>
                        <p>Morbi eget accumsan libero, non tincidunt felis.</p>
                        <p class="tm-mb-0">Tel: <a href="tel:0100200990">010-020-0990</a></p>
                        <p>Email: <a href="mailto:info@company.com">info@company.com</a></p>
                    </div>
                </div>
            </div>
        </section>
        <div class="tm-mb-4 text-center tm-social-s">
            <a href="https://fb.com/templatemo" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
            <a href="https://instagram.com" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
            <a href="https://twitter.com" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
            <a href="https://youtube.com" class="tm-social-link"><i class="fab fa-youtube tm-social-icon"></i></a>
        </div>
        <footer class="text-center tm-mb-1">
            <p>Copyright &copy; 2020 Comparto Studio 
            
            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
        </footer>
    </div> <!-- .container -->
    <script src="../../assets/common.js"></script>
</body>
</html>