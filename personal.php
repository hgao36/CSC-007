<?php
session_start();
?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
<div style="background-color: gray; width: 100%
            ; height: 500px;">

<br>
&ensp;  &ensp;  
    <a href="/index.php">
     <font size="3" face="arial" color="white">HOMEPAGE首页
	</font></a>

	&ensp;  &ensp; 

	<a href="/upload.php">
     <font size="3" face="arial" color="white">UPLOAD NOTES上传笔记
	</font></a>

	&ensp;  &ensp; 

	<a href="/logout.php">
	<font size="3" face="arial" color="white">LOGOUT注销
	</font></p>
	</a>

<br><br><br>
<p style="text-align:center;">
	<img src="avatar.png" width="200px," height="200px">
</p>

<p style="text-align:center;">
<font size="5" face="arial" color="white">
<?php

 echo $_SESSION['uid'];
 

 $servername = "bdm248126481.my3w.com";
$username = "bdm248126481";
$password = "12345678";
$dbname = "bdm248126481_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



    $sql = "SELECT * FROM user WHERE id='{$_SESSION['uid']}'";

    $result = $conn->query($sql);
while($row = $result->fetch_assoc())
{
	echo "</br>";
	echo "Balance当前金币：";
			echo $row['user_money'];

}
  






$conn->close();




?>
</font>
</p>

</div>

</br>
 &ensp;<font size="5" face="arial" color="gray">我的笔记:
	</font></a>
</br>


<?php


 

 $servername = "bdm248126481.my3w.com";
$username = "bdm248126481";
$password = "12345678";
$dbname = "bdm248126481_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



    $sql2 = "SELECT * FROM notes WHERE note_author='{$_SESSION['uid']}'";

    $result2 = $conn->query($sql2);
while($row2 = $result2->fetch_assoc())
{
			
			echo '笔记名称:'.$row2['note_name'];
			echo '&ensp;';
			echo '笔记介绍:'.$row2['note_description'];
			echo '&ensp;';
			echo '$'.$row2['note_price'];

			echo '</br>';

}
  
$conn->close();


?>




</body>

</html>