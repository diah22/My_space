
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/default.css">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/utils.css">
    <link rel="stylesheet" href="../../assets/css/calendar.css">
    <title>Project</title>
</head>
<body>
    <?php include('../Utils/headers.php'); ?>
    <div class="content-event">
        <div id="showcase-wrapper">
            <div class="col-event">
                <div id="myCalendarWrapper"></div>
            </div>
            <div class="col-event">
               <div class="edit-area">
                    hello
               </div>
            </div>
        </div>
    </div> 
    <?php include('modal/add.event.php'); ?> 
</body>
<script src="../../assets/js/CalendarPicker.js"></script>
<script src="../../assets/js/calendar.js"></script>
<script src="../../assets/js/modal.js"></script>
</html>