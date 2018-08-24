<?php
session_start();
?>

<!DOCTYPE html>

<body>


<p style="text-align:center;">
<a href="search.php"><button type="button">Back to search</button></a>
</p>


       <?php 



$servername = "bdm248126481.my3w.com";
$username = "bdm248126481";
$password = "12345678";
$dbname = "bdm248126481_db";

$cuser = $_SESSION['uid'];


if ($_SESSION['uid']==null)
{
	
header("Location: login.php"); 
}



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 




$sql = "SELECT user_id, search_key FROM search_log WHERE user_id = '{$cuser}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  
    while($row = $result->fetch_assoc()) {


    	$sql2 = "SELECT note_name, note_description FROM notes WHERE note_name = '{$row["search_key"]}'";
		$result2 = $conn->query($sql2);

		if ($result2->num_rows > 0) {

 while($row2 = $result2->fetch_assoc()) {
        echo  $row2["note_name"] .": ". $row2["note_description"]. "<br>";
    }
    }
} 
$conn->close();

}




        	?>


 </body>

</html>