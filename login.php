<?php
//设置页面内容是html编码格式是utf-8
header("Content-Type: text/plain;charset=utf-8");
//header("Content-Type: application/json;charset=utf-8");
//header("Content-Type: text/xml;charset=utf-8");
//header("Content-Type: text/html;charset=utf-8");
//header("Content-Type: application/javascript;charset=utf-8");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    search();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
    $a = 0;
    create();
}

function create(){

    $u = $_POST['u'];
    $p = $_POST['p'];
    $conn = mysqli_connect('localhost','root','');
    mysqli_select_db($conn,'myapp');
    $result = mysqli_query($conn,'SELECT * FROM users');
    $dataCount = mysqli_num_rows($result);
    for($i=0;$i<$dataCount;$i++){
        $result_arr = mysqli_fetch_assoc($result);
        $result_name = $result_arr['email'];
        $result_pwd = $result_arr['password'];
        if($u == $result_name && $p == $result_pwd) {
            $conn = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($conn, 'myapp');
            mysqli_query($conn, "INSERT INTO cookie(email,password) VALUE ('$u','$p')");
            echo '{"success":true,"msg":"用户：' . $_POST["u"] . ' 信息保存成功！"}';
            $GLOBALS['a'] = 1;
            break;
        }
    }
    if($GLOBALS['a'] == 0){
        echo '{"success":false,"msg":"登录信息错误!"}';
    }
}
?>
