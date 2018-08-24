<?php
session_start();
?>

<!DOCTYPE html>

<body>

<br></br>
<br></br>
<br></br>
<p style="text-align:center;">

<font size="20" face="Verdana">
Search for notes
</font>


</p>

<br></br>
<form method="post">
<p style="text-align:center;">
	<label><input type="text" name="content"></label>

    <button type="submit" name="submit">search</button>
</p>
</form>

<?php


$servername = "bdm248126481.my3w.com";
$username = "bdm248126481";
$password = "12345678";
$dbname = "bdm248126481_db";

$cuser = $_SESSION['uid'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



if (isset($_POST['submit'])){




$sql = "INSERT INTO search_log (user_id, search_key)

VALUES ('{$cuser}','{$_POST['content']}')";




	if ($conn->query($sql) === TRUE) {

echo "success";

header("Location: result.php"); 


} 

}

$conn->close();



?>


 </body>

</html>