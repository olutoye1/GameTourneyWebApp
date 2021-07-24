<!DOCTYPE html>
<html lang="en">

	<head>
	<title> AMMO Team Details
	</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
     

  <?php
  
  $Team_Name = $_POST ['TeamName'];
  $Team_Pass = $_POST ['Password'];
  $Team_Abv = $_POST ['TeamAbbreviation'];  
  $Team_Logo = $_POST ['TeamLogo'];  
  $Win = $_POST ['Wins'];
  $Loss = $_POST ['Loss'];	
 
  $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "anthonm1", "anthonm1", "anthonm1");

  if (mysqli_connect_errno())exit("Error - could not connect to MySQL");
  
  $constructed_query = "INSERT INTO teams (team_name, team_pass, team_abv, team_logo, wins, loses)
  values ('$Team_Name', '$Team_Pass', '$Team_Abv', '$Team_Logo', '$Win', '$Loss')";
  
  $result = mysqli_query($db, $constructed_query);
  ?>
	

       <div class="eventsHeaderLong">
        <p style="font-size: 32pt;">Your Team</p>
     </div>
  <div class="eventsBody">
        
        <div class="eventFormHolder">
  <p>
  
   Team Name: <?php echo $Team_Name ?> <br/>
   Team Adv: <?php echo $Team_Abv ?> <br/>
   Team Logo: <?php echo $Team_Logo ?> <br/>
   Wins: <?php echo $Win ?> 
   Loses: <?php echo $Loss ?> <br/>

   <a href="AMMOGamingCreateTeam.html"> You can go back!</a>

  </p>
  </div>
 </div>
 </body>
  </html>
  