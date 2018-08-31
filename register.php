
 <?php
session_start();
?>
<html>
<body>
 



  <meta charset="UTF-8">
  <title>login</title>
  <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
    <h2 class="form-signin-heading">现在注册</h2>
    <label for="inputEmail" class="sr-only">email</label>
    <br>
    <input type="email" name="id" id="inputEmail" class="form-control" placeholder="请输入电子邮箱" required autofocus>
    <br>


    <label for="inputPassword" class="sr-only">password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="请输入密码" required>
    <br>


    <label for="inputPassword" class="sr-only">password2</label>
    <input type="password" name="password2" id="inputPassword" class="form-control" placeholder="请再次输入密码" required>
    <br>


    <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" type="submit" value="注册">

   </form>
  </div>








<?php
$servername = "bdm248126481.my3w.com";
$username = "bdm248126481";
$password = "12345678";
$dbname = "bdm248126481_db";


$idnum = "{$_POST['id']}";
$passwordnum = "{$_POST['password']}";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



if (isset($_POST['submit'])){


$sql = "INSERT INTO user (id, password)

VALUES ('{$_POST['id']}','{$_POST['password']}')";

if (empty($idnum)=== TRUE)
{
  
 echo "<script>alert('id or password cannot be empty');</script>";
}
else if(empty($passwordnum)=== TRUE)
{
     echo "<script>alert('id or password cannot be empty');</script>";
}
else{

	if ($conn->query($sql) === TRUE) {


       

    header("location:index.php"); 


       $_SESSION['uid']=$_POST['id'];






} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
}



$conn->close();



?>


</body>
</html>