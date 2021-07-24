<?php
    /* cookies used to remember the leam logged in after hitting a submit button */
    if (isset($_POST['teamName']) && isset($_POST['teamPass'])) {
        setcookie("teamname", $_POST['teamName'], time()+86400, '/');
        setcookie("teampass", $_POST['teamPass'], time()+86400, '/');
    }
    if (isset($_COOKIE["teamname"]) && isset($_COOKIE["teampass"])) {
        $teamname = $_COOKIE["teamname"];
        $teampass = $_COOKIE["teampass"];     
    }
    else {
        setcookie("teamname", $_POST['teamName'], time()+86400, '/');
        setcookie("teampass", $_POST['teamPass'], time()+86400, '/');    
    }
?>

<!DOCTYPE html>
<html lang="en">

	<head>
	<title> Team Details
	</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="AMMOGamingStyle.css" title="style" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500&display=swap" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/prototype/1.6.0.3/prototype.js" type="text/javascript"></script>
    <script src="AMMOGamingTeamDetails.js" type="text/javascript"></script>
</head>

<body>
    <!-- navigation bar code -->
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
     
    <!-- page's heading -->
     <div class="tDetailsHeaderLong">
        <p style="font-size: 32pt;">My Team Details</p> 
    </div>

    <?php
        /* pulling information from this page's submit buttons. checks to make sure variables are only set when page acceses itself */ 
        if (isset($_POST['addPlayer']) || isset($_POST['removePlayer'])) {
            $playertag = htmlspecialchars($_POST['mtag']);
        }
        if (isset($_POST['addGame']) || isset($_POST['removeGame'])) {
            $gametitle = htmlspecialchars($_POST['gtitle']);
        }
        if (isset($_POST['teamName'])) {
            $teamname = htmlspecialchars($_POST['teamName']);
        }
        if (isset($_POST['teamPass'])) {
            $teampass = htmlspecialchars($_POST['teamPass']);
        }

        /* open connection to mysql database */
        $db = mysqli_connect("studentdb-maria.gl.umbc.edu", "anthonm1", "anthonm1", "anthonm1");

        /* basic database connection check */   
        if (mysqli_connect_error()) {
            exit("Error - could not connect to MySQL");
        }

        /* escape all sql sequences on our inputs */
        if (isset($playertag)) {
            $playertag = mysqli_real_escape_string($db, $playertag);
        }
        if (isset($playertag)) {
            $playertag = mysqli_real_escape_string($db, $playertag);
        }
        $teamname = mysqli_real_escape_string($db, $teamname);
        $teampass = mysqli_real_escape_string($db, $teampass);

        /* query that will later be used to match team names and passwords */
        $validation_query = "SELECT * FROM teams WHERE team_name='$teamname'";
        $validation_result = mysqli_query($db, $validation_query);

        if(! $validation_result) {
            print("Error - query could not be executed");
            $error = mysqli_error($db);
            print "<p> . $error . </p>";
            exit;
        }

        $team_array = mysqli_fetch_array($validation_result);

        /* implementing the validation query for a sort of login function. all further page funcitons require a successful login. */
        if ($teamname == $team_array['team_name'] && $teampass == $team_array['team_pass']) {
            /* add or remove player as necessary */
            if (isset($_POST['addPlayer'])) {
                if ($playertag != "") {
                    $insert_player_query = "INSERT INTO membership (team_name, player_name) values ('$teamname', '$playertag')";
                    $insert_player_result = mysqli_query($db, $insert_player_query);
                }
            }
            if (isset($_POST['removePlayer'])) {
                $remove_player_query = "DELETE FROM membership WHERE player_name='$playertag' AND team_name='$teamname'";
                $remove_player_result = mysqli_query($db, $remove_player_query);    
            }

            /* add or remove game as necessary */
            if (isset($_POST['addGame'])) {
                if ($gametitle != "") {
                    $insert_game_query = "INSERT INTO gameplay (team_name, game_name) values ('$teamname', '$gametitle')";
                    $insert_game_result = mysqli_query($db, $insert_game_query);
                }    
            }
            if (isset($_POST['removeGame'])) {
                $remove_game_query = "DELETE FROM gameplay WHERE game_name='$gametitle'";
                $remove_game_result = mysqli_query($db, $remove_game_query);    
            }

            /* search database for all of a teams members */
            $membership_query = "SELECT * FROM membership WHERE team_name='$teamname'";
            $membership_result = mysqli_query($db, $membership_query);
            
            if(! $membership_result) {
                print("Error - query could not be executed");
                $error = mysqli_error($db);
                print "<p> . $error . </p>";
                exit;
            }

            $num_rowsm = mysqli_num_rows($membership_result)
    ?>
    
    <div class="tDetailsBody">
        <div class="teamheading">
            <h2><img class="logo" src="Images/team-logo.jpg" alt="Team logo." height="150" width="150" /><?php echo $teamname; ?></h2>
        </div>
    
        <div class="membersH">
            <h2>Members</h2>
        </div>
        
        <div class="gamesH">
            <h2>Featured Games</h2>
        </div>
    
        <div class="membersL">
            <ul>
                <?php
                for ($row_num = 1; $row_num <= $num_rowsm; $row_num++) {
                    $row_array = mysqli_fetch_array($membership_result);
                    print("<li>$row_array[player_name]</li>");
                }
                ?>
            </ul>
        </div>

        <?php
            $gameplay_query = "SELECT * FROM gameplay WHERE team_name='$teamname'";
            $gameplay_result = mysqli_query($db, $gameplay_query);
            
            if(! $gameplay_result) {
                print("Error - query could not be executed");
                $error = mysqli_error($db);
                print "<p> . $error . </p>";
                exit;
            }

            $num_rowsg = mysqli_num_rows($gameplay_result)
        ?>
        
        <div class="gamesL">
            <ul>
                <?php
                for ($row_num = 1; $row_num <= $num_rowsg; $row_num++) {
                    $row_array = mysqli_fetch_array($gameplay_result);
                    print("<li>$row_array[game_name]</li>");
                }
                ?>
            </ul>
        </div>

        <div class="memberTextbox">
            <form action="AMMOGamingTeamDetails.php" method="POST" id="changeMember">
              <label for="mtag">Member name:</label>
              <label for="availCheck">Availability:</label><br>
              <input type="text" id="mtag" name="mtag" onkeyup="checkAvailability(this.value)">
              <input type="text" id="availCheck"><br>
              <button class="additem" type="submit" name="addPlayer" id="addPlayer" value="addPlayer">Add Player</button>
              <button class="removeitem" type="submit" name="removePlayer" id="removePlayer" value="removePlayer">Remove Player</button>
            </form>
        </div>
        
        <div class="gameTextbox">
            <form action="AMMOGamingTeamDetails.php" method="POST" id="changeGame">
              <label for="gtitle">Game title:</label>
              <label for="sugestion">Suggestion:</label><br />
              <input type="text" id="gtitle" name="gtitle" onkeyup="showSuggestion(this.value)">
              <input type="text" id="suggestion"><br />
              <button class="additem" type="submit" name="addGame" id="addGame" value="addGame">Add Game</button>
              <button class="removeitem" type="submit" name="removeGame" id="removeGame" value="removeGame">Remove Game</button>
            </form>
            <br />
            <br />
            <form action="AMMOGamingLogin.php" method="POST" id="chameTeam">
                <button class="removeitem" type="submit" name="deleteTeam" id="deleteTeam" value="<?php echo $teamname;?>">DELETE TEAM</button>
            </form>
        </div>	

    </div>

    <?php
        }
        /* if a login is not successful, direct the user back to the login page without running any page functions. */
        else {
           print("<div class=\"error\"><p>Invalid team name or password. Click <a href=\"AMMOGamingLogin.php\">here</a> to try again.</p></div>");    
        }
    ?>
    
     

</body>


</html>