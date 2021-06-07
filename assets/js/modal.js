const no= document.getElementById('.no-edit');
const modal= document.querySelector('.modal');
no.addEventListener('click', function(){
    no.removeAttribute(readonly);
})

const modalClose= document.getElementById('close');
modalClose.addEventListener('click', function(){
    alert('ok');
    modal.style.visibility='hidden';
})