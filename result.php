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

<style>
div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 275px;
    border-radius:5px;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 273px;
    height: 275px;
    border-radius:5px 5px 0px 0px;
}

div.desc {
    padding: 15px;
    text-align: center;
}
</style>









</head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>



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
              <a class="nav-link" href="search.php">搜索笔记<span class="sr-only">(current)</span></a>
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



    <br>





<a href="search.php">
<div class="container">
<div class="card text-white bg-secondary my-4 text-center">
        <div class="card-body">

<p class="text-white m-0">返回重新搜索</p>

          
        </div>
      </div>

</a>


      <!-- Content Row -->
      <div class="row">
       

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


      $sql2 = "SELECT * FROM notes WHERE note_name = '{$row["search_key"]}'";
    $result2 = $conn->query($sql2);

if ($result2->num_rows <= 0)
{
  echo '
        </div>



   </div>
<br>
  <p style="text-align:center;">
  <img src="img/noresult.png" width="190px," height="120px">
</p>

  <p style="text-align:center;"><font size = 4 color = "gray" >没有找到相关笔记 : (</font></p>';
} 

    if ($result2->num_rows > 0) {

 while($row2 = $result2->fetch_assoc()) {
        
$str = $row2['note_description'];

  if(strlen($str)>23){
$str=substr($str,0,23)."...";
}



      echo '<div class="gallery">
  <a target="_blank" href="img/note_icon.jpg">
    <img src="img/note_icon.jpg" alt="note" width="300" height="300"  >
  </a>
  <div class="desc"><strong><font size="4">'.$row2['note_name'].'
  </font></strong></br>
  介绍:'.$str.'</br>$'.$row2['note_price'].'

  </div>
</div>
     

   ';

  }

  echo' </div>



   </div>';
    }
} 

$sql3 = "delete FROM search_log WHERE user_id = '{$cuser}'";
$conn->query($sql3);


$conn->close();

}

else
{
  echo '
        </div>



   </div>
<br>
  <p style="text-align:center;">
  <img src="img/noresult.png" width="200px," height="120px">
</p>

  <p style="text-align:center;"><font size = 5 color = "gray" >没有找到相关笔记 : (</font></p>';
} 




          ?>



      
     
        <!-- /.col-md-4 -->




        <!-- /.col-md-4 -->



 </body>

</html>