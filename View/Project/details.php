<?php
    include_once('../../Controller/ProjectController/projectController.php');
    include_once('../../Models/Transaction/Utils.php');
    $projectC= new ProjectController();
    $task_num=0;
    
    if(isset($_GET['id']) && $_GET['id']!==''){
        $id=$_GET['id'];
        $donnee= $projectC->getProjectById($id);
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
    <title>Project</title>
</head>
<body>
    <?php include('../Utils/headers.php');
          include('../Utils/nav.php') ?>
    <div class="content"> 
        <div class="col-block details-proj">
            <h3>Add goals in your project</h3>
            <input type="text" class="input mb-10" id="id_goals_project" placeholder="Your goal">
            <div class="align in-middle">
                <label>Start</label>
                <input type="date" class="input mb-10 input-date-proj" id="id_dates"> 
            </div>
            <div class="align in-middle">
                <label>End</label>
                <input type="date" class="input mb-10 input-date-proj" id="id_datee">
            </div>
            <h6>Tasks</h6>
            <div class="task-add-container">
                <div class="task-for-proj">
                    <input type="text" class="input goal-task mb-10" name="task-proj-0">
                    <input type="date" class="input goal-date mb-10" name="datel-0">
                </div>
                <button class="btn add-task-for-proj">+</button>
            </div>
            <div class="in-middle">
                <button class="bubbly-button mt-20" id="submitGoal" onclick="submitGoals()">Save</button>
            </div>
        </div>
        <div class="project-details col-block">
            <label>Title: </label>
            <input type="text" class="no-edit mb-20" id="id_nom" value="<?php echo $donnee['nom']?>" readonly>
            <input type="hidden" id="id_proj" value="<?php echo $donnee['id']?>">
            <label>Description:</label>
            <textarea class="no-edit mb-20" od="id_descri" cols="30" readonly>
                <?php echo $donnee['description'] ?>
            </textarea>
            <label>State: </label><br>
            <select class="no-edit mb-20" id="id_state" readonly>
                <option value="<?php echo $donnee['statut']?>" default><?php echo $donnee['statut']?></option>
            </select><br>
            <label>Deadline: </label>
            <input class="no-edit mb-20" id="id_deadl" type="date" value="<?php echo $donnee['date_limite']?>" readonly>
            
            <a class="btn-simple c-green" id="btn-modif-proj" onclick="changeModif()">Modifier</a>
            <a href="index.php" class="btn-simple">Go back</a>
        </div>
    </div>
</body>
<script src="../../assets/js/xhr.js"></script>
<script src="../../assets/js/project.js"></script>
<script>
    let to_edit_mode= false;
    const modifbtn= document.getElementById('btn-modif-proj');
    const xhr= getXMLHttpRequest();
    function changeModif(){
        if(to_edit_mode)
        {
            let id= document.getElementById('id_proj').value;
            let deadline= document.getElementById('id_deadl').value;
            let descri= 'ok';
            let nom= document.getElementById('id_nom').value;
            let state= document.getElementById('id_state').value;

            nom= encodeURIComponent(nom);
            descri= encodeURIComponent(descri); // remains text form
            xhr.onreadystatechange= function(){
                if(xhr.readyState==4 && (xhr.status == 200 ||xhr.status == 0)){
                    alert(xhr.responseText);
                }
            }
            xhr.open("POST", "../../Controller/ProjectController/modifProject.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("id="+ id +"&nom="+ nom +"&descri="+ descri +"&state="+ state +"&deadline="+deadline);
            // alert('willing to change');
        }
        to_edit_mode= !to_edit_mode;
        console.log(to_edit_mode);
        const noEdit= document.querySelectorAll('.no-edit');
        noEdit.forEach(no => {
            no.classList.remove('no-edit');
            no.classList.add('input');
            no.removeAttribute('readonly');
        });
        modifbtn.classList.remove('c-green');
        modifbtn.classList.add('c-red');
    }
</script>
</html>