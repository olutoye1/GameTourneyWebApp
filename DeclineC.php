<?php
    /* cookies used to remember the leam logged in after hitting a submit button */
    if (isset($_COOKIE["teamname"]) && isset($_COOKIE["teampass"])) {
        $teamname = $_COOKIE["teamname"];
        $teampass = $_COOKIE["teampass"];     
    }
?>


<!DOCTYPE html>
<html lang="en">

	<head>
	<title> My AMMO Events
	</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="AMMOGamingStyle.css" title="style" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500&display=swap" rel="stylesheet">
    <script type = "text/javascript" src= "eventSelect.js" > </script>
    
    

</head>

<body>

    <div class="navHolder">
        <div class="linkHolder">
            <a href="AMMOGamingHome.html"> <img src="Images/AMMOGamingLogo.JPG" width="70px" height="40px"> </a>
        </div>

        <div class="linkHolder">
            <a href="AMMOGamingTeams.php"> <img src="Images/TeamMenu.JPG" width="70px" height="30px"> </a>
        </div>

        <div class="linkHolder">
            <a href="AMMOGamingEvents.php"> <img src="Images/EventsMenu.JPG" width="70px" height="30px"> </a>
        </div>

        <div class="linkHolder">
            <a href="AMMOGamingLeader.php"> <img src="Images/LeaderBMenu.JPG" width="70px" height="40px"> </a>
        </div>
   </div>
     
     <div class="eventsHeaderLong">
        <p style="font-size: 32pt;">My Team's Events</p>
     </div>
     
     <div class="eventsBody2">

        <?php

        $database = mysqli_connect("studentdb-maria.gl.umbc.edu", "anthonm1","anthonm1", "anthonm1");
        
        if (mysqli_connect_errno())
            exit("Error -- unable to connect to MySQL Database");
        // Required field names

        $requiredValues = array('eedate1', 'teamone1', 'teamtwo1');

        // Loop over field names, make sure each one exists and is not empty

        $error = false;
        foreach($requiredValues as $field) {
             if (empty($_POST[$field])) {
                $error = true;
                    }
            }

        if ($error) {
            echo "All fields are required.";
            } else {
    
                $gameDate2 = $_POST["eedate1"];
                $teamone2 = $_POST["teamone1"];
                $teamtwo2 = $_POST["teamtwo1"];
         
        


                $remove_event_query = "DELETE FROM events WHERE team_one='$teamone2' AND team_two='$teamtwo2' AND eventdate='$gameDate2'";
                $remove_event_results = mysqli_query($db, $remove_event_query);

                echo "<script type='text/javascript'>
                        alert('EVENT DELETED');
                </script>";
        ?>
      

            
     </div>

     <div class="flexer">

        <div class="subMenuElement">
            <a href="AMMOGamingCreateEvents.html" font-size="32pt">Create an Event</a>
         </div>

         <div class="subMenuElement">
            <a href="AMMOGamingMyEvents.php" font-size="32pt" >My Team's Events</a>
         </div>

        

    </div>

</body>


</html>