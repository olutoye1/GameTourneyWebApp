"use strict";

window.onload=pageLoad;
function pageLoad(){
	document.getElementById("Submit").onclick=validate;

	
}
function validate(){
	
  var teamName = document.getElementByName("TeamName").value;

	if (myName == "")  
	{

	alert("First name is empty. Re-enter");
    
		return false;
	}
	else{
		return true;
	}
  var teamAbr = document.getElementByName("TeamAbbreviation").value;

	if (teamAbr == "")  
	{

	alert("Team Abbreviation is empty. Re-enter");
    
		return false;
	}
	else{
		return true;
	}
  var teamLogo = document.getElementByName("TeamLogo").value;

	if (teamLogo == "")  
	{

	alert("A logo wasn't entered. Re-enter");
    
		return false;
	}
	else{
		return true;
	}
  var teamWins = document.getElementByName("Wins").value;

	if (teamWins== "")  
	{

	alert("Win Bracket is empty. Re-enter");
    
		return false;
	}
	else{
		return true;
	}
  var teamLoss = document.getElementByName("Loss").value;

	if (teamLoss == "")  
	{

	alert("Loss Bracket is empty. Re-enter");
    
		return false;
	}
	else{
		return true;
	}
  var teamPass = document.getElementByName("Password").value;

	if (teamPass == "")  
	{

	alert("Password is empty. Re-enter");
    
		return false;
	}
	else{
		return true;
	}

}
