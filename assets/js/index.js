
const listI= document.querySelector('.list-item');
let todoItem = {
    items: [],
    addItem: function(item){
      this.items.push(item);
      return this;
    },
    deleteItem: function(item){
        delete this.items[item]; //function defined in object for deleting element in object
    }
  }

let arrayItem; 

const ul= document.querySelector('.list-item');
ul.addEventListener('click', function(e){
  let target= e.target;
  if(target.tagName.toUpperCase()=="LI"){
    target.parentNode.removeChild(target);
  }
});

function addSingleTodo(){
    const li= document.createElement('li');
    const item= document.getElementById('item').value;
    todoItem.addItem(item);
    arrayItem= todoItem.items;
    arrayItem.forEach(array=>{
        li.innerHTML= ` ${array} `;
        listI.appendChild(li);
    })

    document.getElementById('item').value="";
}


function addItem(){
	const xhr= getXMLHttpRequest();
	xhr.onreadystatechange= function(){
		if(xhr.readyState==4 &&(xhr.status==200 || xhr.status==0)){
      alert(xhr.responseText);
		}
	};
  todo= JSON.stringify(todoItem);
	xhr.open("GET", "../../Controller/TaskController/addTodo.php?todo="+ todo, true);
	xhr.send(null);
}

function searchtask(val){
  const sdate= val;
  xhr.onreadystatechange= function(){
		if(xhr.readyState==4 &&(xhr.status==200 || xhr.status==0)){
      renderTask(xhr.responseText);
		}
	};
	xhr.open("GET", "../../Controller/TaskController/getTask.php?date="+ sdate, true);
	xhr.send(null);
}

function renderTask(data){
  const content= document.querySelector('.content-body');
  content.innerHTML= data;
}


const todoButton= document.getElementById('submitTodo');
todoButton.addEventListener('click', addItem);
