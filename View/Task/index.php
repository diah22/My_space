<?php
    session_start();
    $userId= $_GET['userid'];
    include_once('../../Controller/TaskController/taskController.php');
    include_once('../../Controller/UserController/userController.php');
    $cdate= date("Y-m-d");
    $tdate= date('l d');
    $taskC= new TaskController();
    $userC= new UserController();
    $user= $userC->getUserById($userId);
    $tasks= $taskC->getAllTaskByDate($cdate);
    $datecurrent= new DateTime();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../../assets/css/index.css"> 
<link rel="stylesheet" href="../../assets/css/default.css"> 
<link rel="stylesheet" href="../../assets/css/utils.css"> 
<link rel="stylesheet" href="../../assets/css/home.css"> 
</head>
<body>
<?php include_once('../Utils/headers.php');
      include_once('../Utils/nav.php');
 ?>
 
    <div class="container">
        <div class="content">
            <div class="content-section">
                <div class="content-header-left">
                    <h2><?php echo $tdate ?></h2>
                </div>
                <div class="content-header-right">
                    <div class="card-trans-header">
                        <input type="date" id="search-date" class="input input-date-task" onChange="searchtask(this.value)">
                        <!-- <button class="btn"><img class="icon" src="../../assets/icon/search-1.png"></button> -->
                    </div>
                    <div class="card-trans-body">
                        <div id="openModal" class="modalDialog">
                            <div class="space-between">
                                <h3>Add task<h3>
                                <a href="#close" title="Close" class="close"><span style="font-size:16px">X</span></a>
                                <!-- <a onclick=closemodal() style="justify-content:space-between"><span class="close">&times;</span></a> -->
                            </div>
                            <div class="space-between">
                                <input type="text" id="item" class="input modal-content-container" placeholder="Doing ... ">
                                <input style="display:none" id="id_user" value="<?php echo $userId; ?>">
                                <button class="btn-rounded btn-size-icon" onclick="addSingleTodo()">+</button>
                            </div>
                            
                            <div class="list-todo">
                                <ul class="list-item">

                                </ul>
                                <div class="in-middle">
                                    <button class="bubbly-button btn-modal" id="submitTodo" disabled>Valider</button>
                                </div>
                            </div>
                        </div>
                        <div class="content-body">
                            <div class="task-area">
                            <?php
                                if($tasks == null || $tasks == ""){
                                    ?>
                                    <div class="content-body no-task">
                                        <div class="content-body-header">
                                            <p class="text-center">No task for today . Do you want to add new task?</p><br>
                                        </div>
                                        <div class="content-body-">
                                            <img alt="task" class="task-bgimage" src="../../assets/images/task-1.jpg"> 
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
                                                <a href="#openModal" style="float:right; margin-left:30px">Add </a>
                                            </tr>
                                            <?php
                                                    foreach($tasks as $task){
                                                    ?>
                                                    <tr>
                                                        <td class="row-data task"><?php echo $task['contenu']?></td>
                                                        <td class="row-data state">
                                                            <div class="state-content">
                                                                <?php
                                                                if( $task['statut'] === 'N'){
                                                                    ?>
                                                                    <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=N' class="checking cross checked-cross">✖</a>
                                                                    <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=EC' class="checking loading">⌛</a>
                                                                    <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act=O' class="checking tick">✔</a>
                                                                <?php
                                                                } 
                                                                elseif($task['statut']=== 'EC'){
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
                    </div>
                    <div class="card-trans-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const modal= document.querySelector('.modal');
    const container= document.querySelector('.container');
    let dateCurrent= new Date();
    document.getElementById('modal-task').addEventListener('click', function(){
        document.querySelector("body").style.overflow = 'hidden';
    });
    document.querySelector('.close').addEventListener('click'; function(){
        document.querySelector("body").style.overflow = 'visible';
    });


    
</script>
<script src="../../assets/js/xhr.js"></script>
<script src="../../assets/js/modal.js"></script>
<script src="../../assets/js/default.js"></script>
<script src="../../assets/js/index.js"></script>
<script src="../../assets/js/utils.js"></script>
</html>

