<?php
    /* cookies used to remember the leam logged in after hitting a submit button */
    if (isset($_COOKIE["teamname"]) && isset($_COOKIE["teampass"])) {
        $teamname = $_COOKIE["teamname"];
        $teampass = $_COOKIE["teampass"];     
    }
?>

<html>
<head>
	<title>Create Event</title>
	<link rel="stylesheet" type="text/css" href="AMMOGamingStyle.css" title="style" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500&display=swap" rel="stylesheet">
    
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
      <p style="font-size: 32pt;">Create An Event</p>
  </div>


<div class="eventsBody">
  <div class="eventFormHolder">

<?php

$database = mysqli_connect("studentdb-maria.gl.umbc.edu", "anthonm1","anthonm1", "anthonm1");

if (mysqli_connect_errno())
    exit("Error -- unable to connect to MySQL Database");
// Required field names

$requiredValues = array('edate', 'gamepic', 'gamemode', 'gameset','enemyname');

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
    
    $gameDate = $_POST["edate"];
	  $gameChoice = $_POST["gamepic"];
    $gameMode = $_POST["gamemode"];
    $gameSet = $_POST["gameset"];
    $oppName = $_POST["enemyname"];
  
 
  



    


    echo "Event was Successfully Created!";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "Date :  $gameDate";
    echo "<br>";
    echo "Game Selected : $gameChoice";
    echo "<br>";
    echo "Game Mode : $gameMode";
    echo "<br>";
    echo "Number of Rounds : $gameSet";
    echo "<br>";
    echo "$teamname is up against $oppName";
    echo "<br>";
    echo "<br>";
    echo "<br>";

    $addevent_query = "INSERT INTO events ( `eventdate`, `eventgame`, `gamemode`, `eventrounds`, `team_one`, `team_two`) VALUES ('$gameDate','$gameChoice','$gameMode','$gameSet','$teamname','$oppName')";

    $addevent_results = mysqli_query($database, $addevent_query);
}

  
?>


  </div>
</div>

<div class="flexer">

        <div class="subMenuElement">
            <a href="AMMOGamingEvents.php" font-size="32pt">Events</a>
         </div>
         
         <div class="subMenuElement">
            <a href="AMMOGamingMyEvents.php" font-size="26pt" >My Team's Events</a>
         </div>

        <div class="subMenuElement">
            <a href="AMMOGamingCreateEvents.html" font-size="26pt">Create an Event</a>
         </div>


</div>


</body>
</html>