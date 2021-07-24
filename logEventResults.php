<?php
    /* cookies used to remember the evenr selected in after hitting a submit button */
   // if (isset($_POST['teamone']) && isset($_POST['teamtwo']) && isset($_POST['eedate'])) {
     //   setcookie("teamone", $_POST['teamone'], time()+400, '/');
     //   setcookie("teamtwo", $_POST['teamtwo'], time()+400, '/');
     //   setcookie("eedate", $_POST['eedate'], time()+400, '/');
   // }
    //if (isset($_COOKIE["teamone"]) && isset($_COOKIE["teamtwo"]) && isset($_POST['eedate'])) {
    //    $teamone = $_COOKIE["teamone"];
     //   $teamtwo = $_COOKIE["teamtwo"];    
     //   $eedate = $_COOKIE["eedate"]; 
  //  }
  //  else {
      //  setcookie("teamone", $_POST['teamone'], time()+400, '/');
      //  setcookie("teamtwo", $_POST['teamtwo'], time()+400, '/');
      //  setcookie("eedate", $_POST['eedate'], time()+400, '/');
           
  //  }
?>

<html>
<head>
	<title>Match Results</title>
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
      <p style="font-size: 32pt;">Match Results</p>
  </div>


<div class="eventsBody">
  <div class="eventFormHolder">

<?php

$database = mysqli_connect("studentdb-maria.gl.umbc.edu", "anthonm1","anthonm1", "anthonm1");

if (mysqli_connect_errno())
    exit("Error -- unable to connect to MySQL Database");
// Required field names

$requiredValues = array('teamOneRounds', 'teamTwoRounds');

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
    
  $teamOneValue = $_POST["teamOneRounds"];
	$teamTwoValue = $_POST["teamTwoRounds"];
  
 
    
    if ($teamOneValue > $teamTwoValue){
      //  $winner = $teamOneValue;
      //  $addevent_query = "UPDATE events SET winner='$teamone' WHERE team_one='$teamone' AND team_two='$teamtwo' AND eventdate='$eedate'";

      //  $addevent_results = mysqli_query($database, $addevent_query);

        //$addwin_query = "UPDATE teams SET wins=wins+1 WHERE team_name='$teamone'";
       // $addwin_results = mysqli_query($database, $addwin_query);

       // $addloss_query = "UPDATE teams SET loses=loses+1 WHERE team_name='$teamtwo'";
        //$addloss_results = mysqli_query($database, $addloss_query);

        echo "<script type='text/javascript'>
          alert('team one wins');
          </script>";
    } else {
       // $winner = $teamTwoValue;
       // $addevent_query = "UPDATE events SET winner='$teamone' WHERE team_one='$teamone' AND team_two='$teamtwo' AND eventdate='$eedate'";
       // $addevent_results = mysqli_query($database, $addevent_query);

        //$addwin_query = "UPDATE teams SET wins=wins+1 WHERE team_name='$teamtwo'";
        //$addwin_results = mysqli_query($database, $addwin_query);

       // $addloss_query = "UPDATE teams SET loses=loses+1 WHERE team_name='$teamone'";
       // $addloss_results = mysqli_query($database, $addloss_query);

        echo "<script type='text/javascript'>
            alert('team two wins');
            </script>";
    }



    

}

?>
  </div>
</div>


</body>
</html>