<?php


session_start();
include 'connection.php';
mysqli_select_db($conn, "ppl");
$homegoal = array();
$awaygoal = array();

if(isset($_POST['homeGoals']))
{
	$homegoal = $_POST['homeGoals'];
}

if(isset($_POST['awayGoals']))
{
	$awaygoal = $_POST['awayGoals'];
}


$currentUser = $_SESSION['user'];

$sql = "SELECT idUsers FROM users WHERE username = '$currentUser'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$id = $row["idUsers"];
$gw = $_SESSION['gameweek'];

$sizeOfarray = count($homegoal);
echo $sizeOfarray;	
echo "</br>";
echo $gw;
echo $homegoal[4];
	for($c=0;$c<$sizeOfarray;$c++)
	{
		
		$insertQuery = "INSERT INTO predictions(Matchweek,HomeGoals,AwayGoals,userID,FixtureNumber)VALUES('$gw', '$homegoal[$c]', '$awaygoal[$c]', '$id','$c')";
		if(mysqli_query($conn,$insertQuery))
		{	
			echo "New record created successfully";
			echo "</br>";
		}

	}



?>