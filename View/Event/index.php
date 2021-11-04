<?php
    session_start();
    include_once('../../Controller/EventController/eventController.php');
    include_once('../../Models/Transaction/EventTransaction.php');
    $cdate= date("Y-m-d");
    $tdate= date('l d');
    $eventC= new EventController();
    $donnees= $eventC->getAllEvent($_SESSION['user']);
    $datecurrent= new DateTime();
    if(isset($_POST['savevent'])){
        $heured= $_POST['heured'];
        $heuref= $_POST['heuref'];
        $descri= $_POST['descri'];
        $date= $_POST['date'];
        $user= $_SESSION['user'];
        $eventC->addEvent($heuref, $heured, $descri, $date, $user);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../assets/css/index.css" rel="stylesheet" />
    <link href="../../assets/css/default.css" rel="stylesheet" />
    <link href="../../assets/css/calendar.css" rel="stylesheet" />
    <link href="../../assets/css/calendarPicker.css" rel="stylesheet" />
    <title>Task</title>
<!--

Comparto TemplateMo

https://templatemo.com/tm-544-comparto

-->
</head>

<body>
    <div class="container-fluid">
        <div class="tm-site-header tm-mb-1">
            <div class="tm-site-name-container tm-bg-linear">
                <h1 class="tm-text-white">MySpace</h1>
            </div>
            <div class="tm-nav-container tm-bg-color-1">
                <nav class="tm-nav" id="tm-nav">
                    <ul>
                        <li class="tm-nav-item">
                            <a href="../Utils/dashboard.php?userid=<?php $_SESSION['user'] ?>" class="tm-nav-link">
                                <!-- <span class="tm-mb-1"></span> -->
                                <img src="../../assets/icons/time.png">
                                <span class="tm-nav-item-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="tm-nav-item">
                            <a href="../Task/index.php" class="tm-nav-link">
                                <!-- <span class="tm-mb-1">.02</span> -->
                                <img src="../../assets/icons/time.png" alt="">
                                <span class="tm-nav-item-menu">Task</span>
                            </a>
                        </li>
                        <li class="tm-nav-item">
                            <a href="#services" class="tm-nav-link">
                                <!-- <span class="tm-mb-1">.02</span> -->
                                <img src="../../assets/icons/event.png" alt="">
                                <span class="tm-nav-item-menu">Project</span>
                            </a>
                        </li>
                        <li class="tm-nav-item current">
                            <a href="#" class="tm-nav-link">
                                <!-- <span class="tm-mb-1">.03</span> -->
                                <img src="../../assets/icons/event.png" alt="">
                                <span class="tm-nav-item-menu">Event</span>
                            </a>
                        </li>
                        <li class="tm-nav-item">
                            <a href="#contact" class="tm-nav-link">
                                <!-- <span class="tm-nav-text tm-mb-1">.04</span> -->
                                <img src="../../assets/icons/more.png" alt="">
                                <span class="tm-nav-text tm-nav-item-menu">More</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <section class="tm-mb-1" id="about">
            <div class="tm-row tm-about-row">
                <div class="tm-section-1-l">
                    <div id="showcase-wrapper" class="col-ev">
                        <div id="myCalendarWrapper"></div>
                    </div>
                </div>
                <div id="openModal" class="modalDialog">
                    <div class="form-event">
                        <div class="form-header">
                            <h3>Add task<h3>
                            <a href="#close" title="Close" class="close"><span style="font-size:16px">X</span></a>
                            <!-- <a onclick=closemodal() style="justify-content:space-between"><span class="close">&times;</span></a> -->
                        </div>
                        <div class="form-body">
                             <form class="form" method="POST">
                                <input type="date" class="input mb-10" style="background-color:#cccccc;" id="date-event" name="date" readonly>
                               
            
                                <div class="in-middle">
                                    <textarea cols="60" class="input" name="descri" rows="5"></textarea>
                                </div>
                                <div class="event-time">
                                    <p>
                                        <label class="input-label">Start time</label>
                                        <input class="input" name="heured" type="time"><br>
                                    </p>
                                    <p>
                                        <label class="input-label">End time</label>
                                        <input class="input" name="heuref" type="time">
                                    </p>
                                </div>
                                <button type="submit" name="savevent" class="bubbly-button f-right">Save</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
                <article class="tm-section-3-r">
                    <div id="show-all-event" class="col-ev">
                        <h2 class="tm-mb-2 tm-title-color">Events</h2>
                        <div class="event-content">
                        <?php
                                foreach($donnees as $donnee)
                                {
                                    ?>
                                    <div class="e-container mb-20">
                                        <p><?php echo $donnee['descri']?><p>
                                        <span><?php echo $donnee['date']?></span>
                                    </div>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    </div> <!-- .container -->
    <script src="../../assets/js/xhr.js"></script>
    <script src="../../assets/js/utils.js"></script>
    <script src="../../assets/js/calendar.js"></script>
    <script src="../../assets/js/index.js"></script>
    <script>
        const nextYear = new Date().getFullYear() + 1;
        const myCalender = new CalendarPicker('#myCalendarWrapper', {
            // If max < min or min > max then the only available day will be today.
            min: new Date(),
            max: new Date(nextYear, 10) // NOTE: new Date(nextYear, 10) is "Sun Nov 01 <nextYear>"
        });

        myCalender.onValueChange((currentValue) => {
            const modal= document.querySelector('#openModal');
            const container= document.querySelector('.container');
            const allEvent= document.getElementById('show-all-event');
        
            // container.style.background= '#cccccc';
            // allEvent.style.background='#cccccc';
            // modal.style.visibility= 'visible';
            // modal.style.marginTop= '-70px';
            modal.style.opacity = 1;
            modal.classList.add('pointer');
            document.querySelector("body").style.overflow = 'hidden';
            document.querySelector("body").style.background = '#cccccc';
            console.log(`The current value of the calendar is: ${currentValue}`);
            const datea= document.getElementById('date-event');
            let months= currentValue.getMonth();
            let datecur= currentValue.getDate();
            let fullYear= currentValue.getFullYear();
            months= setProperMonth(months);
            dateP= setProperDate(datecur);
            properDate= setProperFullDate(dateP, months, fullYear);
            console.log(properDate);
            datea.value= properDate;
            
        });
    </script>
</body>
</html>