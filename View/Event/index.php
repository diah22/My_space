<?php
    include('../../Controller/EventController/eventController.php');

    $eventC= new EventController();
    if(isset($_POST['savevent'])){
        $heured= $_POST['heured'];
        $heuref= $_POST['heuref'];
        $descri= $_POST['descri'];
        $date='2021-04-04';
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
    <?php include('../Utils/headers.php'); 
          include('modal/add.event.php') ;?>
    <div class="modal">
    <div class="modal-content">
        <div class="close">x</div>
        <h3>Add event</h3>
        <form method="POST">
            <input type="date" class="input" id="date-event" readonly>
            <input class="input" name="heured" type="number" placeholder="Heure debut">
            <label>h</label>
            <input class="input" name="heuref" type="number" placeholder="Heure fin">
            <label>h</label>
            <textarea cols="60" name="descri" rows="5" type="input" placeholder="Evenement">
            
            </textarea>
            <button type="submit" name="savevent" class="bubbly-button">Save</button>
        </form>
    </div>
</div>
    <div class="event-content">
        <div id="showcase-wrapper" class="col-ev">
            <div id="myCalendarWrapper"></div>
        </div>
        <div id="show-all-event" class="col-ev">
           <h4>All event</h4>
        </div>
    </div>
        
</body>
<script src="../../assets/js/modal.js"></script>
<script src="../../assets/js/CalendarPicker.js"></script>
<script>
    const nextYear = new Date().getFullYear() + 1;
    const myCalender = new CalendarPicker('#myCalendarWrapper', {
        // If max < min or min > max then the only available day will be today.
        min: new Date(),
        max: new Date(nextYear, 10) // NOTE: new Date(nextYear, 10) is "Sun Nov 01 <nextYear>"
    });

    myCalender.onValueChange((currentValue) => {
        const modal= document.querySelector('.modal');
        modal.style.marginTop= '-70px';
        console.log(`The current value of the calendar is: ${currentValue}`);
        const datea= document.getElementById('date-event');
        datea.value= currentValue;
    });
</script>
<!-- <script src="../../assets/js/modal.js"></script> -->
</html>