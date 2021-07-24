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
     
     <div class="eventsBody">

        <?php

            $database = mysqli_connect("studentdb-maria.gl.umbc.edu", "anthonm1","anthonm1", "anthonm1");

            if (mysqli_connect_errno())
                exit("Error -- unable to connect to MySQL Database");    

            $getmyevents_query = "SELECT * FROM events WHERE team_one='$teamname' OR team_two='$teamname'";

            $getmyevents_results = mysqli_query($database, $getmyevents_query);

            $num_rows = mysqli_num_rows($getmyevents_results);
            $num_fields = mysqli_num_fields($getmyevents_results);


            for($row_num = 1; $row_num <= $num_rows; $row_num++) {
                $row_array = mysqli_fetch_array($getmyevents_results);

                echo '<div class="matchupHolder">';
                    echo '<div class="matchupName">';
                   echo '<img src="Images/team-logo.jpg" width="50px" height="50px">';
                   echo ("<p>$row_array[team_one]</p>");
                   echo'<p>VS.</p>';
                   echo("<p>$row_array[team_two]</p>"); 
                   echo '<img src="Images/team-logo.jpg" width="50px" height="50px">';
                   echo'</div>';
                   echo '<div class="matchupDetails">';
                   echo("<p>Game: $row_array[eventgame]</p>"); 
                   echo("<p>Game Mode: $row_array[gamemode]</p>");
                   echo("<p>Time: $row_array[eventdate]</p>");
                     echo'</div>';
                echo'</div>';

            }
                
        
        ?>
            <form action="AcceptC.php" method="POST">

            <p> 
                Enter Event Date/Time:<input type ="datetime-local" id = "eedate" name="eedate">
                </p>
                <p>
                Enter Teamone Name: <input type ="text" id = "teamone" name = "teamone">
                </p>
                <p>
                Enter Teamtwo Name: <input type ="text" id = "teamtwo"  name = "teamtwo">
                </p>
                <input type="submit" name="Submit">
           </form>
            <button type="button" id="23">Accept Event Challenge </button><br>
            

            <form action="DeclineC.php" method="POST">

            <p> 
                Enter Event Date/Time:<input type ="datetime-local" id = "eedate1" name = "eedate1">
                </p>

                <p>
                Enter Teamone Name: <input type ="text" id = "teamone1" name = "teamone1">
                </p>
                <p>
                Enter Teamtwo Name: <input type ="text" id = "teamtwo1" name ="teamtwo1">
                </p>
                <input type="submit" name="Submit2">
           </form>
            
            <button type="button" id="24">Decline Event Challenge</button>
        

            
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