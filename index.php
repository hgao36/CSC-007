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

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="/logo.png" width="30px," height="30px"> 学霸记</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">首页
                <span class="sr-only">(current)</span>
              </a>
            </li>


        <li class="nav-item">
              <a class="nav-link" href="search.php">搜索笔记</a>
            </li>


                  <li class="nav-item">
              <a class="nav-link" href="upload.php">上传笔记</a>
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

    <!-- Page Content -->
    <div class="container">

      <!-- Heading Row -->
      <div class="row my-4">
        <div class="col-lg-8">

      



<br></br>
          <img class="img-fluid rounded" src="http://csc412sfsu.com/~hhuang8/image.png" alt="">
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
          <h1>Visitor history:</h1>



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




$sql = "SELECT id, log FROM csc412";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  
    while($row = $result->fetch_assoc()) {
        echo   "User [".$row["id"] ."] visited in ". $row["log"]. "."."<br>";
    }
} 
$conn->close();




        	?>


          
        </div>
        <!-- /.col-md-4 -->
      </div>
      <!-- /.row -->

      <!-- Call to Action Well -->
      <div class="card text-white bg-secondary my-4 text-center">
        <div class="card-body">

<p class="text-white m-0">Generic page for csc412</p>
        	
          
        </div>
      </div>

      <!-- Content Row -->
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title">Latest Comments</h2>
              <p class="card-text">




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




$sql = "SELECT user, text FROM comments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  
    while($row = $result->fetch_assoc()) {
        echo   $row["user"] .": ". $row["text"]. "<br>";
    }
} 
$conn->close();




        	?>








              </p>
            </div>
            <div class="card-footer">




            	<form method="post">

	<label><input type="text" name="content"></label>

    <button type="submit" name="submit">submit</button>
</form>



            
            </div>
          </div>
        </div>



        <!-- /.col-md-4 -->
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title">About</h2>
              <p class="card-text">Heqiang Huang, a student at SFSU, and this site is a practice site for CSC412 in Spring 2018...


</p>
            </div>
            <div class="card-footer">
			

  <a href="http://csc412sfsu.com/~hhuang8/profile.php" class="btn btn-primary">More Info</a>


            </div>
          </div>
        </div>
        <!-- /.col-md-4 -->




        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title">Weather</h2>
              <p class="card-text">


<a class="weatherwidget-io" href="https://forecast7.com/en/37d77n122d42/san-francisco/" data-label_1="SAN FRANCISCO" data-label_2="WEATHER" data-days="3" data-theme="gray" >SAN FRANCISCO WEATHER</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
</p>






             </div>
       
          </div>
        </div>
        <!-- /.col-md-4 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Xuebaji 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



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




$sql = "INSERT INTO comments (user, text, time)

VALUES ('{$cuser}','{$_POST['content']}',CURRENT_TIMESTAMP )";




	if ($conn->query($sql) === TRUE) {

echo "success";




} 

}

$conn->close();



?>



  </body>

</html>
