<?php
session_start();
    include('../../Controller/EventController/eventController.php');

    $eventC= new EventController();
    $donnees= $eventC->getAllevent();
    if(isset($_POST['savevent'])){
        $heured= $_POST['heured'];
        $heuref= $_POST['heuref'];
        $descri= $_POST['descri'];
        $date= $_POST['date'];
        $eventC->addEvent($heuref, $heured, $descri, $date);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/default.css">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/utils.css">
    <link rel="stylesheet" href="../../assets/css/CalendarPicker.style.css">
    <link rel="stylesheet" href="../../assets/css/calendar.css">
    <title>Project</title>
</head>
<body>
<div class="container">
    <?php include('../Utils/headers.php'); 
          include('../Utils/nav.php'); 
          include('modal/add.event.php') ;?>
    <div class="modal modal-event">
        <div class="modal-content">
            <div class="space-between">
                <h3>Add event</h3>
                <a onclick=closemodalevent()><span class="close">&times;</span></a>
            </div>           
            <form class="form" method="POST">
                <input type="date" class="input mb-10" style="background-color:#cccccc;" id="date-event" name="date" readonly>
                <div class="in-middle">
                    <label class="input-label">Start time</label>
                    <input class="input-2 mb-10" name="heured" type="time"><br>
                </div>
                <div class="in-middle">
                    <label class="input-label">End time</label>
                    <input class="input-2 mb-10" name="heuref" type="time">
                </div>   
                <div class="in-middle">
                    <textarea cols="60" class="input-3 mb-20" name="descri" rows="5"></textarea>
                </div>
                
                <button type="submit" name="savevent" class="bubbly-button f-right">Save</button>
            </form>
        </div>
    </div>
    <div class="event-content">
        <div id="showcase-wrapper" class="col-ev">
            <div id="myCalendarWrapper"></div>
        </div>
        <div id="show-all-event" class="col-ev">
           <h4>All event</h4>
           <?php
                foreach($donnees as $donnee)
                {
                    ?>
                    <p><?php echo $donnee['descri']?><p>
                    <?php
                }
           ?>
        </div>
    </div>
    </div>
</body>
<script src="../../assets/js/modal.js"></script>
<script src="../../assets/js/CalendarPicker.js"></script>
<script src="../../assets/js/utils.js"></script>
<script src="../../assets/js/default.js"></script>
<script>
    const nextYear = new Date().getFullYear() + 1;
    const myCalender = new CalendarPicker('#myCalendarWrapper', {
        // If max < min or min > max then the only available day will be today.
        min: new Date(),
        max: new Date(nextYear, 10) // NOTE: new Date(nextYear, 10) is "Sun Nov 01 <nextYear>"
    });

    myCalender.onValueChange((currentValue) => {
        const modal= document.querySelector('.modal');
        const container= document.querySelector('.container');
        const allEvent= document.getElementById('show-all-event');
    
        container.style.background= '#cccccc';
        allEvent.style.background='#cccccc';
        modal.style.visibility= 'visible';
        modal.style.marginTop= '-70px';
        document.querySelector("body").style.overflow = 'hidden';
        document.querySelector("body").style.background = '#cccccc';
        console.log(`The current value of the calendar is: ${currentValue}`);
        const datea= document.getElementById('date-event');
        let months= currentValue.getMonth();
        let datecur= currentValue.getDate();
        let fullYear= currentValue.getFullYear();
        months= setProperMonth(months);
        properDate= setProperDate(datecur, months, fullYear);
        console.log(properDate);
        datea.value= properDate;
        
    });
</script>
<!-- <script src="../../assets/js/modal.js"></script> -->
</html>