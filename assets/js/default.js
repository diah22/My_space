const container= document.querySelector('.container');
const allEvent= document.getElementById('show-all-event');

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
  allEvent.style.background='#fff';
  document.querySelector("body").style.overflow = 'visible';
  document.querySelector("body").style.background = '#fff';
}