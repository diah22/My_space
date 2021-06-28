/** variables */
let task=0;
let i=0;
let pGoals= {
  oneitem:[],
  addOneGoalItem: function(goal, datel){
    this.oneitem.push({
      name: goal,
      date: datel
    })
    return this;
  }
}

/* Variables elements */ 
const toggleBtn= document.getElementById('toggle');
const container= document.querySelector('.container');
const taskContainer= document.querySelector('.task-add-container');
const tasks= document.querySelector('.goal-task');
const dates= document.querySelector('.goal-date');
const saveGoals= document.getElementById('submitGoal');


/** Make buttons disabled when list goals projetct empty */


/**  appel function */
toggleBtn.addEventListener('click', slideEffet);

function showArea(){
  document.getElementById('btn_show_task').style.display='none';
  taskContainer.style.display= 'table';
}

// function changeDisabled(){
//   if(goals_proj === "" || datestart == "" || dateend == ""){
//     document.getElementById('submitGoal').disabled= true;
//   }
//   else{
//     document.getElementById('submitGoal').disabled= false;
//   }
  
// }

function slideEffet(){
  const divToShow= document.querySelector('.add-project');
  divToShow.style.visibility = 'visible';
  divToShow.style.top= '170px';
  divToShow.style.left= '10px';
  container.classList.add('toggle');
}

// function for submitting data to db using ajax
function submitGoals(){
  const goal= document.querySelector('.goal-task').value;
const date= document.querySelector('.goal-date').value;
  pGoals.addOneGoalItem(goal, date);
  const xhr= getXMLHttpRequest();
  xhr.onreadystatechange =function(){
    if(xhr.readyState == 4 && (xhr.status==200 || xhr.status == 0)){
      alert(xhr.responseText);
    }
  }
  
  pGoals= JSON.stringify(pGoals);
  const goals_proj= document.getElementById('id_goals_project').value;
  const datestart= document.getElementById('id_dates').value;
  const dateend= document.getElementById('id_datee').value;

  xhr.open('GET', '../../Controller/ProjectController/addGoals.php?nbrTask='+task+'&pGoals='+pGoals+'&goals='+goals_proj+'&dates='+datestart+'&datee='+dateend, true);
  xhr.send(null);
}

