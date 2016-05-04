<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="1; url='index.php'">
    <title>提交状态</title>
    <style>
        h3{
            text-align: center;
        }
    </style>
</head>
<body>
<h3>提交成功 等待跳转...</h3>
</body>
</html>
<?php
$say_text = $_POST['sayText'];
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'myapp');
mysqli_query($conn,"INSERT INTO message(message) VALUE ('$say_text')");
?>