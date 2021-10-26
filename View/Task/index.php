<?php
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
    <title>Task</title>
<!--

Comparto TemplateMo

https://templatemo.com/tm-544-comparto

-->
</head>

<body>
    <div class="container-fluid">
        <div class="tm-site-header tm-mb-1">
            <div class="tm-site-name-container tm-bg-linear">
                <h1 class="tm-text-white">MySpace</h1>
            </div>
            <div class="tm-nav-container tm-bg-color-1">
                <nav class="tm-nav" id="tm-nav">
                    <ul>
                        <li class="tm-nav-item">
                            <a href="../Utils/dashboard.php" class="tm-nav-link">
                                <!-- <span class="tm-mb-1"></span> -->
                                <img src="../../assets/icons/time.png">
                                <span class="tm-nav-item-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="tm-nav-item current">
                            <a href="#services" class="tm-nav-link">
                                <!-- <span class="tm-mb-1">.02</span> -->
                                <img src="../../assets/icons/time.png" alt="">
                                <span class="tm-nav-item-menu">Task</span>
                            </a>
                        </li>
                        <li class="tm-nav-item">
                            <a href="#services" class="tm-nav-link">
                                <!-- <span class="tm-mb-1">.02</span> -->
                                <img src="../../assets/icons/event.png" alt="">
                                <span class="tm-nav-item-menu">Project</span>
                            </a>
                        </li>
                        <li class="tm-nav-item">
                            <a href="#gallery" class="tm-nav-link">
                                <!-- <span class="tm-mb-1">.03</span> -->
                                <img src="../../assets/icons/event.png" alt="">
                                <span class="tm-nav-item-menu">Event</span>
                            </a>
                        </li>
                        <li class="tm-nav-item">
                            <a href="#contact" class="tm-nav-link">
                                <!-- <span class="tm-nav-text tm-mb-1">.04</span> -->
                                <img src="../../assets/icons/more.png" alt="">
                                <span class="tm-nav-text tm-nav-item-menu">More</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <section class="tm-mb-1" id="about">
            <div class="tm-row tm-about-row">
                <div class="tm-section-1-l">
                <div class="task-area">
                            <?php
                                if($tasks == null || $tasks == ""){
                                    ?>
                                    <div class="content-body no-task">
                                        <div class="content-body-header">
                                            <p class="text-center">No task for today . Do you want to add new task?</p><br>
                                        </div>
                                        <div class="content-body-">
                                            <!-- <img alt="task" class="task-bgimage" src="../../assets/img/task-1.jpg">  -->
                                        </div>
                                        <a class="bubbly-button" id="modal-task" style="text-decoration:none" href="#openModal">Add task</a>
                                    </div>
                                    <?php
                                }
                                else{
                                    ?>
                                    <div class="task-content">
                                        <table class="table">
                                            <tr>
                                                <th>Tâches</th>
                                                <th id="state" class="state">Statut</th>
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
                                                                    <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=EC' class="checking loading">⌛</a>
                                                                    <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=O' class="checking tick">✔</a>
                                                                <?php
                                                                } 
                                                                elseif($task['state']=== 'EC'){
                                                                    ?>
                                                                    <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=N' class="checking cross">✖</a>
                                                                    <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=EC' class="checking loading checked-ec">✿</a>
                                                                    <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=O' class="checking tick">✔</a>
                                                                <?php
                                                                } else{
                                                                    ?>
                                                                        <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=N' class="checking cross">✖</a>
                                                                        <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=EC' class="checking loading">✿</a>
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
                                    <?php
                                }
                                ?>
                            </div>
                </div>
                <article class="tm-section-pad20-r tm-bg-color-white">
                    <h2 class="tm-mb-2 tm-title-color text-center">To-do List</h2>
                    <div class="flex-direction">
                        <form class="addTodo">
                            <input type="text" id="new-todo" class="input todo" name="todo" placeholder="What's need to be done">
                            <!-- <button class="submit">Add <span>+</span></button> -->
                        </form>
                    </div>
                    <div id="todo-container">
                        <ul class='todo-list' id="todo-list">
                        
                        </ul>
                    </div>
                </article>
            </div>
        </section>
    </div> <!-- .container -->
    <script src="../../assets/js/xhr.js"></script>
    <script src="../../assets/js/index.js"></script>
</body>
</html>