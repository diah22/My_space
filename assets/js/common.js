//loading dashboard page
const dash= document.getElementById('dashboard');
function loadDashboard(){
  const value= dash.dataset['user'];
  alert(value);
}

const items= document.querySelectorAll('.navbar-item');
items.forEach(item =>{
  item.addEventListener('click', function(){
    if(this == item){
      item.classList.remove('nabvar-item');
      const classname= item.className;
      item.classList.add('navbar-item-current');
    }
    else{
      this.classList.remove('navbar-item-current');
      this.classList.add('navbar-item');
    }
  })
})
dash.addEventListener('click', loadDashboard);
