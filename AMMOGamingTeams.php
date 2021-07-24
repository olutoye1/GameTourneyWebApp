<!DOCTYPE html>
<html lang="en">

	<head>
	<title> AMMO Teams Menu
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


     <div class="eventsHeaderLong">
        <p style="font-size: 32pt;">Team Listings</p>
     </div>
     
     <div class="eventsBody">
       
        <?php

            $database = mysqli_connect("studentdb-maria.gl.umbc.edu", "anthonm1","anthonm1", "anthonm1");

            if (mysqli_connect_errno())
                exit("Error -- unable to connect to MySQL Database");    

            $getteam_query = "SELECT * FROM teams";

            $getteam_results = mysqli_query($database, $getteam_query);

            $num_rows = mysqli_num_rows($getteam_results);
            $num_fields = mysqli_num_fields($getteam_results);

            for($row_num = 1; $row_num <= $num_rows; $row_num++) {
                $row_array = mysqli_fetch_array($getteam_results);


            echo '<div class="teamHolder">';
                echo '<img src="Images/team-logo.jpg" width="50px" height="50px">';
                echo ("<p>$row_array[team_name]</p>"); 
                echo ("<p>Record: $row_array[wins]-$row_array[loses]</p>");
            echo '</div>';
            }
        ?>

     </div>
        

     <br>

     <div class="subMenuElement">
        <a href="AMMOGamingCreateTeam.html" font-size="32pt">Create A Team</a>
     </div>
     

</body>


</html>