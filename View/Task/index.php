<?php
    session_start();
    include_once('../../Controller/TaskController/taskController.php');
    include_once('../../Models/Transaction/taskTransaction.php');
    $cdate= date("Y-m-d");
    $tdate= date('l d');
    $taskC= new TaskController();
    $tasks= $taskC->getAllTaskByDate($cdate);
    $datecurrent= new DateTime();
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
                <a id="dashboard" href="" data-user=<?php echo $_SESSION['user'] ?>>

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
         
            <div class="navbar-item-current">
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
                <div class="tm-section-1-l">
                    <div class="task-area">
                      <table class="table">
                        <tr>
                          <th>Tâches</th>
                          <th id="state" class="state">Status</th>
                        </tr>
                        <?php
                          foreach($tasks as $task){
                          ?>
                        <tr>
                          <td class="row-data task"><?php echo $task['content']?></td>
                          <td class="row-data state">
                            <div class="state-content">
                            <?php
                              if( $task['state'] === 'N'){
                            ?>
                                <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=N' class="checking cross checked-cross">✖</a>
                                <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=EC' class="checking loading">⋯</a>
                                <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=O' class="checking tick">✔</a>
                              <?php
                              } 
                              elseif($task['state']=== 'EC'){
                              ?>
                                <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=N' class="checking cross">✖</a>
                                <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=EC' class="checking loading checked-ec">⋯</a>
                                <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=O' class="checking tick">✔</a>
                                <?php
                                } else{
                                ?>
                                  <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=N' class="checking cross">✖</a>
                                  <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=EC' class="checking loading">⋯</a>
                                  <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=O' class="checking tick checked-tick">✔</a>
                                  <?php
                                    }
                                  ?>   
                              </div>
                            </td>
                          </tr>
                          <?php
                            }
                          ?>
                      </table>
                    </div>
                </div>
                <article class="tm-section-pad20-r tm-bg-color-white">
                    <h2 class="tm-mb-2 tm-title-color text-center">To-do List</h2>
                    <div class="flex-direction">
                        <form class="addTodo">
                            <input type="text" id="new-todo" class="input todo" name="todo" placeholder="What's need to be done?">
                            <!-- <button class="submit">Add <span>+</span></button> -->
                        </form>
                    </div>
                    <div id="todo-container">
                        <ul class='todo-list' id="todo-list">
                        
                        </ul>
                    </div>
                    <div class="todo-buttons tm-mb-1">
                      <button class="btn-rounded clear-disabled" onclick="clearLocalstorage()">Clear all</button>
                      <button class="btn-rounded save-disabled" onclick="addItem()">save</button>
                    </div>
                </article>
            </div>
        </section>
    </div> <!-- .container -->
    <script src="../../assets/js/xhr.js"></script>
    <script src="../../assets/js/index.js"></script>
    <script src="../../assets/js/common.js"></script>
</body>
</html>