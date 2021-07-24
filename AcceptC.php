<?php
    /* cookies used to remember the leam logged in after hitting a submit button */
    if (isset($_COOKIE["teamname"]) && isset($_COOKIE["teampass"])) {
        $teamname = $_COOKIE["teamname"];
        $teampass = $_COOKIE["teampass"];     
    }

    
    /* cookies used to remember the evenr selected in after hitting a submit button */
    if (isset($_POST['teamone']) && isset($_POST['teamtwo']) && isset($_POST['eedate'])) {
        setcookie("teamone", $_POST['teamone'], time()+400, '/');
        setcookie("teamtwo", $_POST['teamtwo'], time()+400, '/');
        setcookie("eedate", $_POST['eedate'], time()+400, '/');
    }
    if (isset($_COOKIE["teamone"]) && isset($_COOKIE["teamtwo"]) && isset($_POST['eedate'])) {
        $teamone = $_COOKIE["teamone"];
        $teamtwo = $_COOKIE["teamtwo"];    
        $eedate = $_COOKIE["eedate"]; 
    }
    else {
        setcookie("teamone", $_POST['teamone'], time()+400, '/');
        setcookie("teamtwo", $_POST['teamtwo'], time()+400, '/');
        setcookie("eedate", $_POST['eedate'], time()+400, '/');
           
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
    <script type = "text/javascript" src= "teamonewin.js" > </script>
    <script type = "text/javascript" src= "teamtwowin.js" > </script>
    
    

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
        <p style="font-size: 32pt;">AcceptedEvent</p>
     </div>
     
     <div class="eventsBody">

        <?php

        $database = mysqli_connect("studentdb-maria.gl.umbc.edu", "anthonm1","anthonm1", "anthonm1");
        
        if (mysqli_connect_errno())
            exit("Error -- unable to connect to MySQL Database");
        // Required field names
        
        $requiredValues = array('eedate', 'teamone', 'teamtwo');
        
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
            
            $gameDate1 = $_POST["eedate"];
            $teamone1 = $_POST["teamone"];
            $teamtwo1 = $_POST["teamtwo"];


                echo "<div class='teamHolder'>";
                echo "<img src='Images/team-logo.jpg' width='50px' height='50px'>";
                echo ("<p>$teamone1 </p>"); 
                echo"<p> VS </p>";
                echo ("<p>$teamtwo1</p>");
                echo("<p> @ $gameDate1 </p>"); 
                echo "<img src='Images/team-logo.jpg' width='50px' height='50px'>";
                echo "</div>";

        }
        ?>

        <form action = "logEventResults.php" method = "POST">
            <p>
                How many Rounds did Team One Win?: <input type ="number" name = "teamOneRounds">
            </p>

            <p>
                How many Rounds did Team Two Win?: <input type ="number" name = "teamTwoRounds">
            </p><br>

            <input type="submit" value="Submit">
        </form>
      

            
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