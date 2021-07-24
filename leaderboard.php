<!DOCTYPE html>
<html lang="en">

	<head>
	<title> AMMO Leaderboard
	</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="AMMOGamingStyle.css" title="style" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500&display=swap" rel="stylesheet">
    <script type = "text/javascript"  src = "leaderboard.js" >
	</script>
    

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
        <p style="font-size: 32pt;">Leaderboard</p>
     </div>
     
     <div class="eventsBody">

        <p>    </p><br>
        <p>    </p><br>
        <p>    </p><br>
    <table style = "width: 50%">
	    <tr>
		    <th>Rank</th>
		    <th>Team Name</th>
		    <th>Wins</th>
            <th>Loses</th>
	    </tr>
	    <?php
		    $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "anthonm1", "anthonm1", "anthonm1");
		    $leader_board_query = "SELECT * FROM teams ORDER BY wins DESC";
            $leader_board_result = mysqli_query($db, $leader_board_query);

            $num_rows = mysqli_num_rows($leader_board_result);
            $num_fields = mysqli_num_fields($leader_board_result);

		    for($row_num = 1; $row_num <= $num_rows; $row_num++) {
                print("<tr>");
                $row_array = mysqli_fetch_array($leader_board_result);
                print("<td>$row_num</td>
                       <td>$row_array[team_name]</td>
                       <td>$row_array[wins]</td>
                       <td>$row_array[loses]</td>");
                print("</tr>");
            }    		
        ?>
    </table>

     </div>
     

</body>


</html>