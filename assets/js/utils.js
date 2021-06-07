function setProperMonth($month){
  $month= $month +1;
  if($month < 10)
  {
    $month= "0" + $month;
  }

  return $month;
}

function setProperDate(day, month, year)
{
  return `${year}-${month}-${day}`
  // return `${day}/${month}/${year}`
}
