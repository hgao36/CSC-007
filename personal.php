<?php
session_start();
?>

<!DOCTYPE html>
<head>

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>个人主页</title>

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
              <a class="nav-link" href="logout.php">注销账号
            
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="index.php">首页
            
              </a>
            </li>


        <li class="nav-item">
              <a class="nav-link" href="search.php">搜索笔记</a>
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


    if(empty($_SESSION['uid']))
    {
        echo ' <a class="nav-link" href="login.php">'; 
    }



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
              <a class="nav-link" href="personal.php">                                 </a>
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




<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<div style="background-color: gray; width: 101%
            ; height: 500px;
            margin : -8px;
            border :0px;">

<br>
&ensp;  &ensp;  
   

<br><br><br>
<p style="text-align:center;">
	<img src="avatar.png" width="200px," height="200px">
</p>

<p style="text-align:center;">


<?php



 echo '<font size="6" face="arial" color="white">'.$_SESSION['uid'].'</font><br>';
 

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
    echo'<font size="4" face="arial" color="white">';
while($row = $result->fetch_assoc())
{
   if($row['user_cat']==3)
    {
          echo '【Notetaker】<br>';
    }

    if($row['user_cat']==4)
    {
          echo '【Notetaker审核中】<br>';
    }




	//echo '当前余额：￥';
		//	echo $row['user_money'];
    echo '</font>';

}
  






$conn->close();




?>

</p>

</div>

</br>




<div class="container">



      <div class="card text-white bg-secondary my-4 text-center">
        <div class="card-body">

<p class="text-white m-0">我购买的笔记</p>

          
        </div>
      </div>

 <!-- <div class="row"> -->
      <div class="row">


 
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



    $sql3 = "select * from notes where note_id In (select note_id from purchase_log where user_id ='{$_SESSION['uid']}');";

    $result3 = $conn->query($sql3);


    if ($result3->num_rows <= 0)
    {
    echo' </div>
          <br>
          <p style="text-align:center;">
          <img src="img/noresult.png" width="190px," height="120px">
          </p>
          <p style="text-align:center;"><font size = 4 color = "gray" >暂未购买笔记 : (</font></p>';

    } 

 if ($result3->num_rows > 0){
while($row3 = $result3->fetch_assoc())
{
  $str = $row3['note_description'];

  if(strlen($str)>23){
$str=substr($str,0,23)."...";
}



      echo '<div class="gallery">
  <a target="_blank" href="img/note_icon.jpg">
    <img src="img/note_icon.jpg" alt="note" width="300" height="300"  >
  </a>
  <div class="desc"><strong><font size="4">'.$row3['note_name'].'
  </font></strong></br>
  介绍:'.$str.'</br>$'.$row3['note_price'].'

  </div>
</div>';
    

}
  
echo'</div>';
  }



$conn->close();


?>

       




      
     
        <!-- /.col-md-4 -->




        <!-- /.col-md-4 -->


      <!-- /.row -->

















<div class="card text-white bg-secondary my-4 text-center">
        <div class="card-body">

<p class="text-white m-0">我创建的笔记</p>

          
        </div>
      </div>

      <!-- Content Row -->
      <div class="row">
       


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


    if ($result2->num_rows <= 0)
{
  echo '
   



   </div>
<br>
  <p style="text-align:center;">
  <img src="img/noresult.png" width="190px," height="120px">
</p>

  <p style="text-align:center;"><font size = 4 color = "gray" >暂未创建笔记 : (</font></p>';
} 

 if ($result2->num_rows > 0){
while($row2 = $result2->fetch_assoc())
{
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
</div>';
    

}
  echo'</div>';

  }



$conn->close();


?>


      
     
        <!-- /.col-md-4 -->




        <!-- /.col-md-4 -->


      <!-- /.row -->





    </div>


 <br></br>  
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright&copy;  2017-2018   China XueBaJi   All Rights Reserved  </p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



</body>

</html>