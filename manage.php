
<?php
//设置页面内容是html编码格式是utf-8
header("Content-Type: text/plain;charset=utf-8");
//header("Content-Type: application/json;charset=utf-8");
//header("Content-Type: text/xml;charset=utf-8");
//header("Content-Type: text/html;charset=utf-8");
//header("Content-Type: application/javascript;charset=utf-8");
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'myapp');
$sort = $_POST['sort'];
$birthYear = $_POST['birthYear'];
$month = $_POST['month'];
$days = $_POST['days'];
$amount = $_POST['amount'];
$comment = $_POST['comment'];
mysqli_query($conn,"INSERT INTO manage(sort,birthYear,month,days,amount,comment) VALUE ('$sort','$birthYear','$month','$days','$amount','$comment')");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    search();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
    create();
}
function create(){
    echo '{"success":true,"msg":"类别：' . $_POST["sort"] . ' 信息保存成功！"}';
}
?>