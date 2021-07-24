<?php 
    //array of games
    $ga[]="Call of Duty";
    $ga[]="Fortnite";
    $ga[]="Overwatch";
    $ga[]="Dota 2";
    $ga[]="League of Legends";
    $ga[]="Rocket League";
    $ga[]="Rainbow 6 Seige";
    $ga[]="Super Smash Brothers";
    $ga[]="Valorant";
    $ga[]="Counter Strike";

    //retrieve input text with ajax
    $game=$_GET["gname"];

    //look for the input string as a substring in the array items
    if (strlen($game) > 0) {
        $suggestion="";
        for ($i=0; $i<count($ga); $i++) {
            if (strtolower($game)==strtolower(substr($ga[$i],0,strlen($game)))) {
                if ($suggestion=="") {
                    $suggestion=$ga[$i];
                }
                else {
                    $suggestion=$suggestion." , ".$ga[$i];
                }
            }
        }
    }

    //if matches are found, return the suggestions
    if ($suggestion=="") {
        $response="no suggestion";
    }
    else {
        $response=$suggestion;
    }

    echo $response;
?>