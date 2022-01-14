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
    <link href="../../assets/css/navbar.css" rel="stylesheet" />
    <title>Task</title>
<!--

Comparto TemplateMo

https://templatemo.com/tm-544-comparto

-->
</head>

<body>
    <div class="container-fluid">
        <div class="tm-site-header tm-mb-1">
            <?php include_once "../Utils/navbar.php" ?>
            <div class="navbar-item">
              <div class="navbar-box">
                  <div class="navbar-menu">
                    <a href="../Task/index.php">
                      <div class="menu-pic">
                        <img alt="task" src="../../assets/icons/time.png">
                      </div>
                      <div class="menu-name">
                        Task
                      </div>
                    </a>
                  </div>
              </div>
            </div>
            <div class="navbar-item">
              <div class="navbar-box">
                  <div class="navbar-menu">
                    <a href="../Project/index.php">
                      <div class="menu-pic">
                        <img alt="project" src="../../assets/icons/project.png">
                      </div>
                      <div class="menu-name">
                        Project
                      </div>
                    </a>
                  </div>
              </div>
            </div>
            <div class="navbar-item-current">
              <div class="navbar-box">
                  <div class="navbar-menu">
                    <a href="../Event/index.php">
                      <div class="menu-pic">
                        <img alt="event" src="../../assets/icons/event.png">
                      </div>
                      <div class="menu-name">
                        Event
                      </div>
                    </a>
                  </div>
              </div>
            </div>
            <div class="navbar-item">
              <div class="navbar-box">
                  <div class="navbar-menu">
                  <div class="menu-pic">
                        <img alt="an image here">
                    </div>
                    <a href="#link">More</a>
                  </div>
              </div>
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
                        <h2 class="tm-mb-2 event-title dt-h2-title">Events</h2>
                        <div class="event-content">
                        <?php
                                foreach($donnees as $donnee)
                                {
                                    ?>
                                    <div class="e-container mb-20">
                                        <div class="e-row-one">
                                            <div><span><?php echo $donnee['date']?></span> </div>
                                            <div><?php echo $donnee['descri']?> 
                                            </div>
                                        </div>
                                        <div class="e-row-two">
                                            <div><?php echo $donnee['start_time'] ?> - <?php echo $donnee['end_time'] ?></div>
                                        </div>
                                       
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
    <script src="../../assets/js/common.js"></script>
    <script>
        const modal= document.querySelector('#openModal');
        const container= document.querySelector('.container');
        const allEvent= document.getElementById('show-all-event');

        const nextYear = new Date().getFullYear() + 1;
        const myCalender = new CalendarPicker('#myCalendarWrapper', {
            // If max < min or min > max then the only available day will be today.
            min: new Date(),
            max: new Date(nextYear, 10) // NOTE: new Date(nextYear, 10) is "Sun Nov 01 <nextYear>"
        });

        myCalender.onValueChange((currentValue) => {        
            modal.style.opacity = 1;
            modal.classList.add('pointer');       
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
        const closebutton= document.querySelector('.close');
        closebutton.addEventListener('click', function(){
        modal.style.opacity = 0;
        modal.classList.remove('pointer');
        });
    </script>
</body>
</html>