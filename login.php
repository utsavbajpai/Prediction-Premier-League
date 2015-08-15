<?php

if (isset($_POST['submit']))
{
	include 'connection.php';
	session_start();

	mysqli_select_db($conn,"ppl");

	$username = $_POST['usernamelogin'];
	$password = $_POST['pwlogin'];

	$sql = "SELECT * FROM users
 	WHERE username='$username'  AND password = '$password'";
	
	$result = mysqli_query($conn, $sql);
	

	if(mysqli_num_rows($result) > 0)
	{
		$_SESSION['user'] = $username;
		$_SESSION['password'] = $password;
		echo "Login Successful";
		echo "</br>";
		header('Location: preidction.php');
		
	}
	else
	{
		echo "Username and passwords do not match";
	}
}
?>


<html>
<body>

<form action="" method="post">

<table>
<tr>

<td> Enter Username  
 <input type="text" name="usernamelogin">
</td>
</tr>
</br>
</br>

<tr>
 <td> Enter Password
 <input type="text" name="pwlogin">
</td>
</tr>
 </br>

<tr>
<td>
<input type="submit" value="Login" name="submit">
</td>
</tr>


</table>
</form>
</body>