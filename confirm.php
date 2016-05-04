<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数据存储中</title>
</head>
<body>

</body>
</html>
<?php
//echo '1';
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'myapp');
$email = $_POST['email'];
$birthYear = $_POST['birthYear'];
$month = $_POST['month'];
$days = $_POST['days'];
$sex = $_POST['sex-1'];
$password = $_POST['password'];
if(mysqli_query($conn,"INSERT INTO users(email,year,month,days,sex,password) VALUE ('$email','$birthYear','$month','$days','$sex','$password')")){
    echo '<h3 style="text-align: center">保存成功！正在等待跳转...</h3>';
    header("refresh:1;url=login.html");
}else{
     echo '<h3 style="text-align: center">出错了！</h3>';
}