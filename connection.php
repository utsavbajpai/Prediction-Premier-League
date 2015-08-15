<?php
$servername = "localhost:3306/ppl";
$username = "root";
$password = "falling";

// Create connection
$conn = mysqli_connect($servername, $username, $password);


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

?>