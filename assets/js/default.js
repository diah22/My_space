const container= document.querySelector('.container');

function closemodal(){
  const modal= document.querySelector('.modal');
  modal.style.display='none';
  modal.style.marginTop= '-700px';
  container.style.background='#fff';
}

function closemodalevent(){
  modal.style.visibility='hidden';
  modal.style.marginTop= '-700px;';
  container.style.background='#fff';
}