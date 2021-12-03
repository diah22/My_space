const xhr= getXMLHttpRequest();
const addTodo= document.querySelector('.addTodo');
const newTodo= document.getElementById('new-todo');

let todoItem = {
    item : [],
    user: 0,

    addTask : function(task){
        this.item.push(task);
    }, 
    deleteTask: function(task){
        delete this.item[task];
    }

}

function addTodoListItem(){
    const newTodoItem= document.getElementById('new-todo').value;
    todoItem.addTask(newTodoItem);
    displayAllTodo();
}


function displayAllTodo(){
    let ulelement= document.getElementById('todo-list');
    ulelement.innerHTML = ``;
    const arrayItem= todoItem.item;
    arrayItem.forEach(item => {
        // let input= document.createElement('input'); //create first input 
        // input.className='toggle'; //provide class name to the input created above
        // input.type = 'checkbox'; //then set input type to checkbox

        let label= document.createElement('label');
        label.textContent = item;

        let deleteLink= document.createElement('button');
        deleteLink.className='destroy';

        let divForTodo= document.createElement('div');
        divForTodo.className='list-item';
        // divForTodo.appendChild(input);
        divForTodo.appendChild(label);
        divForTodo.appendChild(deleteLink);

        let li= document.createElement('li');
        li.appendChild(divForTodo);
        ulelement.appendChild(li);
    })
}

function detectKeyPress(event){
    if(event.key === "Enter"){
        alert('ou');
        event.preventDefault();
        addTodoListItem();
    }
}
newTodo.addEventListener('keypress', function(e){
    detectKeyPress(e);
});

function addItem(){
    // const user= document.getElementById('id_user').value;
    const dash= document.getElementById('dashboard');
    const user= dash.dataset['user'];
    todoItem.user= user;
    xhr.onreadystatechange= function(){
        if(xhr.readyState==4 &&(xhr.status==200 || xhr.status==0)){
            alert(xhr.responseText);
           window.location.assign('../../View/Task/index.php?userid='+user);
        }
      };
    todo= JSON.stringify(todoItem);
    alert(todo);
    xhr.open("GET", "../../Controller/TaskController/addTodo.php?todo="+ todo, true);
    xhr.send(null);
  }

  
  