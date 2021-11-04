// show notification 
function launch_toast() {
    var x = document.getElementById("toast")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
};

// date
function setProperMonth(m){
    let month= m +1;
    if(month < 10)
    {
      month= "0" + month;
    }
  
    return month;
  }

  function setProperDate(d){
    let date = d;
    if(d <9){ 
      date = "0"+d;
    }
    return date;
  }
  
  function setProperFullDate(day, month, year)
  {
    return `${year}-${month}-${day}`
    // return `${day}/${month}/${year}`
  }
  

launch_toast();