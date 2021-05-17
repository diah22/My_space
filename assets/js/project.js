const toggleBtn= document.getElementById('toggle');
console.log(toggleBtn);
toggleBtn.addEventListener('click', slideEffet);
const container= document.querySelector('.container');

function slideEffet(){
  const divToShow= document.querySelector('.add-project');
  divToShow.style.top= '170px';
  divToShow.style.left= '10px';
  container.classList.add('toggle');
}
