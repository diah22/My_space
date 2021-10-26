const tasks= JSON.parse(localStorage.getItem('todo')) || [];
const addTodo= document.querySelector('.addTodo');
const newTodo= document.getElementById('new-todo');

function addTodoListItem(){
    const newTodoItem= document.getElementById('new-todo').value;
    const todoItem= {
        newTodoItem,
        delete:false
    }
    tasks.push(todoItem);
    localStorage.setItem('todo', JSON.stringify(tasks));
    displayAllTodo();
}

function displayAllTodo(){
    let ulelement= document.getElementById('todo-list');
    ulelement.innerHTML = ``;
    console.log(tasks);
    tasks.map(task => {
        let input= document.createElement('input'); //create first input 
        input.className='toggle'; //provide class name to the input created above
        input.type = 'checkbox'; //then set input type to checkbox

        let label= document.createElement('label');
        // label.textContent = todo;

        let deleteLink= document.createElement('button');
        deleteLink.className='destroy';

        let divForTodo= document.createElement('div');
        divForTodo.appendChild(input);
        divForTodo.appendChild(label);
        divForTodo.appendChild(deleteLink);

        let li= document.createElement('li');
        li.appendChild(divForTodo);
        ulelement.appendChild(li);
    })
}
function detectKeyPress(event){
    if(event.key === "Enter"){
        addTodoListItem();
        event.preventDefault();
    }
}
newTodo.addEventListener('keypress', function(e){
    detectKeyPress(e);
});