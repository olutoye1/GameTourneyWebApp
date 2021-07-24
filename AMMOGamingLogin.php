<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Team Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="AMMOGamingStyle.css" title="style" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500&display=swap" rel="stylesheet">
    </head>

    <body>
        <?php
            $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "anthonm1", "anthonm1", "anthonm1");

            if (isset($_POST['deleteTeam'])) {
                $teamname = $_POST['deleteTeam'];
                $remove_team_query = "DELETE FROM teams WHERE team_name='$teamname'";
                $remove_team_result = mysqli_query($db, $remove_team_query);  
            }
        ?>

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
         
    
         <div class="tDetailsHeaderLong">
            <p style="font-size: 32pt;">Login to AMMO</p> 
        </div>

        <div class="loginBody">
            <div class="loginHeading">
                <h2>Please enter your team name and password:</h2>
            </div>
            <div class="textboxHolder">
                <form name="loginInfo" action="AMMOGamingTeamDetails.php" method="POST">
                    <labe' for="teamName">Team Name:</label>
                    <input type="text" id="teamName" name="teamName" />
                    <br />
                    <label for="teamPass">Password:</label>
                    <input type="text" id="teamPass" name="teamPass" />
                    <br />
                    <input type="submit" value="submit" />
                </form>
            </div>
            
        </div>
    </body>
</html>