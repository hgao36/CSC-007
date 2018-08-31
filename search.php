<?php
session_start();
?>

<!DOCTYPE html>
<head>
	    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>笔记搜索</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/small-business.css" rel="stylesheet">

</head>
<body background = "/img/background.png">

	    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="/logo.png" width="30px," height="30px"> StudyMaster</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">首页
              </a>
            </li>


        <li class="nav-item active">
              <a class="nav-link" href="search.php">搜索笔记<span class="sr-only">(current)</span>
</a>
            </li>


                  <li class="nav-item">


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



    $sql = "SELECT * FROM user WHERE id='{$_SESSION['uid']}'";

    $result = $conn->query($sql);
while($row = $result->fetch_assoc())
{

   if($row['user_cat']==1||$row['user_cat']==2)
    {
          echo ' <a class="nav-link" href="apply.php">';
    }

   if($row['user_cat']==3)
    {
          echo ' <a class="nav-link" href="upload.php">';
    }

    if($row['user_cat']==4)
    {
          echo ' <a class="nav-link" href="personal.php">';
    }



}
  
$conn->close();

?>


             上传笔记</a>
            </li>


            <li class="nav-item">
              
              
<?php
    if(empty($_SESSION['uid'])){
echo '<a class="nav-link" href="login.php">';
echo "点击登陆";


}else{
echo '<a class="nav-link" href="personal.php">';
 echo "你好，".$_SESSION['uid']." ";

}
?>




              </a>
            </li>


            

               <li class="nav-item">
              <a class="nav-link" href="mywork.php">                                 </a>
            </li>


<?php
    if(empty($_SESSION['uid'])){
echo '<a href="/login.php">';


}else{
echo '<a href="/personal.php">';


}
?>

            <img src="/avatar.png"  alt="avatar"  height="40" width="40"/>
      
  </a>
          </ul>
        </div>
      </div>
    </nav>


<br></br>
<br></br>
<br></br>
<p style="text-align:center;">

<font size="22" face="Verdana" color = "white">
笔记搜索</font>


</p>

<br></br>
<form method="post">
<p style="text-align:center;">
	<label><input type="text" name="content"></label>

    <button type="submit" name="submit">&nbsp搜索&nbsp</button>
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