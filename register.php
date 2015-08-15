<html>
<body>
<?php
include 'connection.php';



mysqli_select_db($conn, "ppl");
$user = $_POST['username']; 
$password = $_POST['pw']; 



$sql = "INSERT INTO users(username,password)VALUES('$user','$password')";

 
if(mysqli_query($conn,$sql))
{
echo "New record created successfully";
echo "<br>";

}
else
{
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



?>

</body>
</html>