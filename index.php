<?php
session_start();
?>
<!DOCTYPE html>



<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>记笔记，找笔记，尽在学霸记</title>

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
  border-radius:5px 5px 0px 0px;
    width: 273px;
    height: 275px;
}

div.desc {
    padding: 15px;
    text-align: center;
}


.bannerbox 
{
            width:100%;
            position:relative;
            overflow:hidden;
            height:562px;
}
.banner 
{
            width:1920px; /*图宽*/
            position:absolute;
            left:50%;
            margin-left:-960px; /*图宽的一半*/
}



</style>



  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="/logo.png" width="30px," height="30px"> StudyMaster</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">首页
                <span class="sr-only">(current)</span>
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

     <div class="bannerbox">  
           <div class="banner">  
               <a href="/search.php">
               <img src="/img/banner.jpg">  
             </a>
           </div>  
       </div> 

    <!-- Page Content -->
    <div class="container">

      <!-- Heading Row -->

      <!-- /.row -->

      <!-- Call to Action Well -->
      <div class="card text-white bg-secondary my-4 text-center">
        <div class="card-body">

<p class="text-white m-0">本周热门笔记</p>

          
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



    $sql2 = "SELECT * FROM notes WHERE if_show_homepage = 1";

    $result2 = $conn->query($sql2);
    
while($row2 = $result2->fetch_assoc())
{
  
  $intro = $row2['note_description'];

  if(strlen($intro)>22)
  {
  $intro=substr($intro,0,22)."...";
  }

  $name = $row2['note_name'];

  if(strlen($name)>20)
  {
  $name=substr($name,0,20)."...";
  }



      echo '<div class="gallery">
  <a target="_blank" href="img/note_icon.jpg">
    <img src="img/note_icon.jpg" alt="note" width="300" height="300"  >
  </a>
  <div class="desc"><strong><font size="4">'.$name.'
  </font></strong></br>
  介绍:'.$intro.'</br>$'.$row2['note_price'].'

  </div>
</div>';
    

}
  
$conn->close();



        ?>

      
     
        <!-- /.col-md-4 -->




        <!-- /.col-md-4 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
  <br>
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
