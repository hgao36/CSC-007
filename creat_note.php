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
    <h2 class="form-signin-heading">新建笔记</h2>


        <br>
    <label for="input" class="sr-only">note_name</label>
    <input type="text" name="note_name" id="note_name" class="form-control" placeholder="请输入笔记标题" required autofocus>

    <br>

    <label for="input" class="sr-only">note_course_name</label>
    <input type="text" name="note_course_name" id="note_course_name" class="form-control" placeholder="请输入课程名称" required >
    
    <br>

    <label for="input" class="sr-only">note_professor</label>
    <input type="text" name="note_professor" id="note_professor" class="form-control" placeholder="请输入教授姓名"  >
    
    <br>


    <label for="input" class="sr-only">note_description</label>
    <textarea rows="3" cols="39" type="text" name="note_description" id="note_description" class="form-control" placeholder="请输入笔记备注"></textarea>

    
    <br>

   
  
    <textarea rows="1" cols="3" type="text" name="note_description" id="note_description" class="form-control" placeholder="请输入笔记备注"> 请输入笔记价格</textarea>


 
    <br><br>


    <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" type="submit" value="创建笔记">

   </form>
  </div>








<?php
$servername = "bdm248126481.my3w.com";
$username = "bdm248126481";
$password = "12345678";
$dbname = "bdm248126481_db";


$note_name = "{$_POST['note_name']}";
$note_course_name = "{$_POST['note_course_name']}";
$note_professor = "{$_POST['note_professor']}";
$note_description = "{$_POST['note_description']}";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



if (isset($_POST['submit'])){


$sql = "INSERT INTO notes VALUES (值1, 值2,....)";


if ($conn->query($sql) === TRUE) {



header("location:personal.php"); 

} 

}




$conn->close();



?>







</body>

</html>