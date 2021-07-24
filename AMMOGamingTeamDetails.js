"use strict";

//member availability check
function checkAvailability(inputPlayer) {
    //if there is no input, the status will be blank
    if (inputPlayer.length==0) {
        $("availCheck").innerHTML="";
        return;
    }

    //pass the input string to php with the variable name "pname"
    new Ajax.Request ( "checkAvailability.php", 
                       {method: "get", parameters: {pname:inputPlayer}, onSuccess: ajaxSuccessP});
}

//execute when ajax request was successful
function ajaxSuccessP(ajax) {
    $("availCheck").value=ajax.responseText;
}

//execute when ajax request was unsuccessful 
function ajaxFailureP() {
    alert("Ajax request failed.");
}


//for suggestion for game input
function showSuggestion(inputGame) {
    //if there is no input, the suggestion will be blank
    if (inputGame.length==0) {
        $("suggestion").innerHTML="";
        return;
    }

    //pass the input string to php with the variable name "gname"
    new Ajax.Request ( "getSuggestion.php", 
                       {method: "get", parameters: {gname:inputGame}, onSuccess: ajaxSuccess});
}

//execute when ajax request was successful
function ajaxSuccess(ajax) {
    $("suggestion").value=ajax.responseText;
}

//execute when ajax request was unsuccessful 
function ajaxFailure() {
    alert("Ajax request failed.");
}