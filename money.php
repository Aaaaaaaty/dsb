<?php
//设置页面内容是html编码格式是utf-8
//header("Content-Type: text/plain;charset=utf-8");
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST,GET');
header('Access-Control-Allow-Credentials:true');
header("Content-Type: application/json;charset=utf-8");
//header("Content-Type: text/xml;charset=utf-8");
//header("Content-Type: text/html;charset=utf-8");
//header("Content-Type: application/javascript;charset=utf-8");
if ($_SERVER["REQUEST_METHOD"] == "GET") {

} elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
    creat();
}
function creat(){
//    判断信息是否填写完全在前端完成
//TODO: 获取POST表单数据并保存到数据库
    $conn = mysqli_connect('localhost','root','');
    mysqli_select_db($conn,'myapp');
    $sort = $_POST['sort'];
    $birthYear = $_POST['birthYear'];
    $month = $_POST['month'];
    $days = $_POST['days'];
    $amount = $_POST['amount'];
    $comment = $_POST['comment'];
    mysqli_query($conn,"INSERT INTO manage(sort,birthYear,month,days,amount,comment) VALUE ($sort,$birthYear,$month,$days,$amount,$comment)");
    //提示保存成功
//    echo '{"success":true,"msg":"类型：'.$sort.'"}';
};

?>