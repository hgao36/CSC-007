
<?php
session_start();
?>
<html>
<body>


	logging out...
<?php 

session_destroy(); 
header("location:index.php"); 
?> 
</body>
</html>

