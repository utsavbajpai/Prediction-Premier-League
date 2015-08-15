<html>
<body>

<?php
    include 'connection.php';
    


session_start();
mysqli_select_db($conn,"ppl");
$currentUser = $_SESSION['user'];




echo "<form action='confirm.php' method='post'>";





echo "Login Successful!";

echo "<br>";
echo "Welcome ".$_SESSION['user'];
echo "!";
echo "<br>";
echo "<br>";

	
	echo "</br>";
	$points = 0;
	$uri = 'http://api.football-data.org/alpha/soccerseasons/398/fixtures';
    	$reqPrefs['http']['method'] = 'GET';
    	$reqPrefs['http']['header'] = 'X-Auth-Token:  19b87111f92949c4bd45e4771a67f3cd';
    	$stream_context = stream_context_create($reqPrefs);
    	$response = file_get_contents($uri, true, $stream_context);
    	$fixtures = json_decode($response, true); 



$x = 0;


while($fixtures['fixtures'][$x]['status'] == "FINISHED")
{
	$x++;
}

$points = 0;
$gameweek = $fixtures['fixtures'][$x]['matchday'];	
$test = $gameweek+1;
$_SESSION['gameweek'] = $gameweek;
$_SESSION['startfixtureNumber'] = $x;


	while($gameweek != $test)
{
	echo $fixtures['fixtures'][$x]['homeTeamName'];
	echo "<input type='number' name='homeGoals[]'  min='0' max='10'>";
	echo "vs";
	echo $fixtures['fixtures'][$x]['awayTeamName'];
	echo "<input type='number' name='awayGoals[]'  min='0' max='10'>";
	 echo "</br>";
	echo "<br>";
	$x++;
	$gameweek = $fixtures['fixtures'][$x]['matchday'];	
}

$_SESSION['endfixtureNumber'] = $x;











echo "<input type='submit' name='predict' value='predict'>";
echo "</form>";

?>

</body>


</html>