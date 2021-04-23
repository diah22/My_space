const background= document.querySelector('.dropdownBackground');
const nav= document.querySelector('.topnav');
const menuright= document.querySelector('.right');
const dropdown= document.querySelector('.dropdown');
function handleEnter() {
    this.classList.add('trigger-enter');
    setTimeout(()=> this.classList.contains('trigger-enter') && this.classList.add('trigger-enter-active'), 200);
     background.classList.add('open');
     console.log(dropdown);
    const dropdownCoords= dropdown.getBoundingClientRect();
    const navCoords= nav.getBoundingClientRect();

    const coords = {
      height: dropdownCoords.height,
      width: dropdownCoords.width,
      top: dropdownCoords.top -navCoords.top,
      left: dropdownCoords.left 
    };

    background.style.setProperty('width', `${coords.width}px`);
    background.style.setProperty('height', `${coords.height}px`);
    background.style.setProperty('transform', `translate(${coords.left}px, ${coords.top}px)`);
  }

  function handleLeave() {
    this.classList.remove('trigger-enter', 'trigger-enter-active');
    background.classList.remove('open');
  }
  
  menuright.addEventListener('mouseenter', handleEnter);
  menuright.addEventListener('mouseleave', handleLeave);
//   lists.forEach(list => list.addEventListener('mouseenter', handleEnter));
//   lists.forEach(list => list.addEventListener('mouseleave', handleLeave));