<?php
session_start();
?>

<!DOCTYPE html>
<head>

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>申请成为Notetaker</title>

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

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="/logo.png" width="30px," height="30px"> StudyMaster</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">首页
      
              </a>
            </li>


        <li class="nav-item ">
              <a class="nav-link" href="search.php">搜索笔记</a>
            </li>


                  <li class="nav-item active">
              <a class="nav-link" href="upload.php">上传笔记</a>
                        <span class="sr-only">(current)</span>
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


<br><br>

   
  <style>
    body {
     padding-top: 40px;
     padding-bottom: 40px;
     background-color: #eee;
    }
 
    .form-signin {
     max-width: 330px;
     padding: 15px;
     margin: 0 auto;
    }
  </style>
</head>
<body>
    <div class="container">
   <form class="form-signin" action="" method="post">
    <h2 class="form-signin-heading">现在成为Notetaker</h2>


        <br>
    <label for="inputEmail" class="sr-only">realname</label>
    <input type="text" name="realname" id="inputname" class="form-control" placeholder="请输入真实姓名" required autofocus>

    <br>

    <label for="inputEmail" class="sr-only">phonenum</label>
    <input type="text" name="phonenum" id="phonenum" class="form-control" placeholder="请输入手机号码" required >
    
    <br>

    <label for="inputEmail" class="sr-only">school</label>
    <input type="text" name="school" id="school" class="form-control" placeholder="请输入所在院校(全称)" required >
    
    <br>

    <label for="inputEmail" class="sr-only">major</label>
    <input type="text" name="major" id="major" class="form-control" placeholder="请输入专业" required >
    
    <br>

    <label for="inputEmail" class="sr-only">grade</label>
    <input type="text" name="grade" id="grade" class="form-control" placeholder="请输入当前年级" required >
    
    <br>


    <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" type="submit" value="提交申请">

   </form>
  </div>








<?php
$servername = "bdm248126481.my3w.com";
$username = "bdm248126481";
$password = "12345678";
$dbname = "bdm248126481_db";


$realname = "{$_POST['realname']}";
$phonenum = "{$_POST['phonenum']}";
$school = "{$_POST['school']}";
$major = "{$_POST['major']}";
$grade = "{$_POST['grade']}";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



if (isset($_POST['submit'])){


$sql = "UPDATE user SET user_realname = '{$realname}',user_phone_num = '{$phonenum}', user_school = '{$school}', user_major = '{$major}', user_grade = '{$grade}', user_cat = 4 WHERE id = '{$_SESSION['uid']}'";


if ($conn->query($sql) === TRUE) {



header("location:personal.php"); 

} 

}




$conn->close();



?>







</body>

</html>