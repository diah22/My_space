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
const goal= "one that ot away";
const date= "11-1-14";
const toggleBtn= document.getElementById('toggle');
const addTaskBtn= document.querySelector('.add-task-for-proj');
const container= document.querySelector('.container');
const taskContainer= document.querySelector('.task-add-container');
const saveGoals= document.getElementById('submitGoal');

// toggleBtn.addEventListener('click', slideEffet);
addTaskBtn.addEventListener('click', addNewTaskArea);

function slideEffet(){
  const divToShow= document.querySelector('.add-project');
  divToShow.style.top= '170px';
  divToShow.style.left= '10px';
  container.classList.add('toggle');
}

// function for adding new div for goals project
function addNewTaskArea(){
  task++;
  taskContainer.lastElementChild.remove();
  let div= document.createElement('div');
  div.classList.add('task-for-proj');

  let button= document.createElement('button');
  button.style.content = '+';
  button.classList.add('btn', 'add-task-for-proj');
  let area= `
                <input type="text" class="input mb-10" name="task-proj-${task}">
                <input type="date" class="input mb-10" name="datel-${task}">
            `;
  div.innerHTML= area;
  taskContainer.appendChild(div);
  taskContainer.appendChild(button);
  button.addEventListener('click', addNewTaskArea);
  pGoals.addOneGoalItem(goal, date);
  console.log(pGoals);
}

// function for submitting data to db using ajax
function submitGoals(){
  const xhr= getXMLHttpRequest();
  xhr.onreadystatechange =function(){
    if(xhr.readyState == 4 && (xhr.status==200 || xhr.status == 0)){
      alert(xhr.responseText);
    }
  }
  while(i<task){
    classname= `task-proj-${i}`;
    classnamedate= `datel-${i}`;
    taskp= document.querySelector(classname);
    datel= document.querySelector(classnamedate);
    console.log(taskp);
    console.log(datel);
    i++;
  }
  pGoals= JSON.stringify(pGoals);
  xhr.open('GET', '../../Controller/ProjectController/addGoals.php?nbrTask='+task+'&pGoals='+pGoals, true);
  xhr.send(null);
}

