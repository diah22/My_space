const todolist= document.querySelector('.todo-list');
const addTodo= document.querySelector('.addTodo');
const task= JSON.parse(localStorage.getItem('todo')) || [];

function addTodos(e){
    e.preventDefault() // prevent all default process when submitting form
    const todo= (this.querySelector('[name=todo]')).value;
    const todoitem={
        todo,
        delete : false
    };
    task.push(todoitem); //Add new todo item in localStorage
    populateTodo(task, todolist); // showing todo list after adding new one
    localStorage.setItem('todo', JSON.stringify(task)); // refresh localStorage with the new item
    console.log(task);
}

function populateTodo(tasks=[], todolist){
    todolist.innerHTML = tasks.map((task, i)=>{
        return `
            <li> 
                <input type="checkbox" data-index=${i} id="item${i}" ${task.delete? 'checked' : ''}/>
                <label for="item${i}">${task.todo}</label>
            </li>
        `
    }).join('');
}

function toogleDone(e){
    if(!e.target.matches('input')) return ;
    const el= e.target;
    const index= el.dataset.index;
    task[index].delete = !task[index].delete;
    localStorage.setItem('todo', JSON.stringify(task)); // change this line for deleting todo
    populateTodo(task, todolist);
}

addTodo.addEventListener('submit', addTodos);
todolist.addEventListener('click', toogleDone);
populateTodo(task, todolist);