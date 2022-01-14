function showProject(){
    const insideel= document.querySelector('.slide-2');
    const wrapperel= document.querySelector('.slide-1');
    const height = insideel.clientHeight;
    console.log(height); 
    wrapperel.style.transform = `translateY(${height}px)`;
    insideel.style.transform = "translateY(0%)";
}

function goBack(){
    const insideel= document.querySelector('.slide-2');
    const wrapperel= document.querySelector('.slide-1');
    wrapperel.style.transform = "translateY(0)";
    insideel.style.transform = "translateY(-100%)";
}