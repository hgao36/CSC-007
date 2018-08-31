
 <?php
session_start();
?>



<html>
<head>
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
    <h2 class="form-signin-heading">登陆</h2>
    <label for="inputEmail" class="sr-only">email</label>
    <br>
    <input type="email" name="id" id="inputEmail" class="form-control" placeholder="请输入电子邮箱" required autofocus>
    <br>
    <label for="inputPassword" class="sr-only">password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="请输入密码" required>
    <br>
    <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" type="submit" value="登陆">
    <br>
 <a href="/register.php">
  <input  class="btn btn-lg btn-primary btn-block"  value="还没有账号？现在注册">
</a>


    
   </form>
  </div>



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






if (isset($_POST['submit']))
{




    $sql = "SELECT * FROM user
    WHERE id='{$_POST['id']}' AND password='{$_POST['password']}'";

    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
         header("Location: index.php"); 
         $_SESSION['uid']=$_POST['id'];

    }
    else
    {
         echo "<script>alert('id or password wrong');</script>";
    }



}

$conn->close();



?>




</body>
</html>