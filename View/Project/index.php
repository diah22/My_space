<?php
session_start();
    include_once('../../Controller/ProjectController/projectController.php');
    include_once('../../Models/Transaction/Utils.php');
    $projectC= new ProjectController();
   
    $userId= $_GET['userid'];
    $donnees= $projectC->getAllProject($userId);
    if(isset($_POST['addProject'])){
        $title= $_POST['title'];
        $descri= $_POST['descri'];
        $datel= $_POST['datel'];
        $default_statut= 'N';
        $user= $userId;
        $result= $projectC->addProject($title, $descri, $default_statut, $datel, $user);
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
    <link rel="stylesheet" href="../../assets/css/home.css">
    <title>Project</title>
</head>
<body>
    <?php include('../Utils/headers.php');
          include('../Utils/nav.php');
     ?>
    <div class="content">
        <div class="container">
            <div class="col">
                <h1> Recent project </h1>
            </div>
            <div class="col col-end">
                <button id="toggle" class="bubbly-button">Add new project</button>       
            </div>
            <div class="cards card-row">
            <?php
                foreach($donnees as $donnee){
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h5><?php echo $donnee['nom'];?></h5>
                        </div>
                        <div class="card-content">
                            <p><?php echo $donnee['description'];?></p>
                            <p><b>Deadline: </b> <?php echo $donnee['date_limite']; ?><p>
                        </div>
                        <div class="card-footer">
                            
                        <p><span><?php echo Utils::getState($donnee['statut']); ?></span></p>
                            <a href="details.php?id=<?php echo $donnee['id'];?>&userid=<?php echo $userId ?>" class="btn-outline card-footer-content">More details</a>
                        </div>
                    </div>
                <?php
                }
            ?>
            </div>    

        </div>
        
        <div class="add-project">
            <form method="POST" style="padding:20px;box-shadow: 0px 7px 29px 0px rgba(0,0,0, 0.2);">
                <h2>Add new project</h2>
                <label for="title">Title</label><br>
                <input type="text" name="title" class="input"><br>
                <label for="title">Description</label><br>
                <textarea class="input" name="descri" cols=40 rows=6 ></textarea><br>
                <label for="title">Deadline</label><br>
                <input type="date" name="datel" class="input">
                <button class="bubbly-button btn-submit-project" name="addProject" type="submit">Valider</button>
            </form>
        </div>  
    </div>
</body>
<script src="../../assets/js/project.js"></script>
</html>