<?php
    session_start();
    include_once('../../Controller/ProjectController/projectController.php');
    include_once('../../Models/Transaction/projectTransaction.php');
    $projectC= new ProjectController();
    $user = $_SESSION['user'];
    if(isset($_POST['addProject'])){
        $title= $_POST['title'];
        $descri= $_POST['descri'];
        $datel= $_POST['datel'];
        $default_statut= 'N';
        $result= $projectC->addProject($title, $descri, $default_statut, $datel, $user);
    }
   
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
            <?php include_once "../Utils/navbar.php" ?>
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
            <div class="navbar-item-current">
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
        <section class="tm-mb-1" id="about" class="project-section">
          <div class="main-slide">
            <div class="slide-project">
              <div class="tm-row tm-about-row slide-1">
                  <article class="tm-section-pad20-r tm-bg-color-white">
                    <button class="tm-btn" onclick="showProject()">Show all projects</button>
                  </article>
                  <div class="tm-section-1-l project-section">
                    <div class="add-project">
                      <form method="POST" style="box-shadow: 0px 7px 29px 0px rgba(0,0,0, 0.2);">
                          <h2 class="text-center">Plan your project, Start here</h2>
                          <label for="title">Project title</label><br>
                          <input type="text" name="title" class="input"><br>
                          <label for="title">Description</label><br>
                          <textarea class="input" name="descri" cols=40 rows=6 ></textarea><br>
                          <label for="title">Deadline</label><br>
                          <input type="date" name="datel" class="input">
                          <button class="bubbly-button btn-submit-project" name="addProject" type="submit">Add</button>
                      </form>
                    </div>  
                  </div>
              </div>
            </div>
            <div class="tm-about-row slide-2">
              <div class="tm-show-project">
                <h2 class="tm-float-left">All your project</h2>  
                <input type="text" class="tm-float-right input input-pr" placeholder="Search by name, date, etc">
              </div>
              <div class="all-project">
                <div class="card card-project">
                  hi
                </div>
                <div class="card card-project">
                  hi
                </div>
                <div class="card card-project">
                  hi
                </div>
                <div class="card card-project">
                  hi
                </div>
                <div class="card card-project">
                  hi
                </div>
                <div class="card card-project">
                  hi
                </div>
                <div class="card card-project">
                  hi
                </div>
                <div class="card card-project">
                  hi
                </div>
                <div class="card card-project">
                  hi
                </div>
              </div>
            </div>
          </div>
          
        </section>
      
           
   
    </div> <!-- .container -->
    <script src="../../assets/js/xhr.js"></script>
    <script src="../../assets/js/project.js"></script>
    <script src="../../assets/js/common.js"></script>
</body>
</html>