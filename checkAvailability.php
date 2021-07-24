<?php
//this code uses the same logic as getSuggestion.php except I pull an array of player names from my SQL database
//code looks to match input strings with the names pulled from the database to see if they  are available
$pname = htmlspecialchars($_GET["pname"]);

$db = mysqli_connect("studentdb-maria.gl.umbc.edu", "anthonm1", "anthonm1", "anthonm1");

if (mysqli_connect_error()) {
    exit("Error - could not connect to MySQL");
}

$pname = mysqli_real_escape_string($db, $pname);

$player_names_query = "SELECT player_name FROM membership";
$player_names_result = mysqli_query($db, $player_names_query);

if(! $player_names_result) {
    print("Error - query could not be executed");
    $error = mysqli_error($db);
    print "<p> . $error . </p>";
    exit;
}

$num_rows = mysqli_num_rows($player_names_result);

if (strlen($pname) > 0) {
    $suggestion = "";

    for ($row_num=1; $row_num <= $num_rows; $row_num++) {
        $player_array = mysqli_fetch_array($player_names_result);
        if (strtolower($pname)==strtolower($player_array["player_name"])) {
            $suggestion = "UNAVAILABLE";
        }
    }
}

if ($suggestion=="") {
    $response="AVAILABLE";
}
else {
    $response=$suggestion;
}

echo $response;
?>