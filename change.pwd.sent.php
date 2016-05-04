<?php
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'myapp');
$result1 = mysqli_query($conn,'SELECT * FROM cookie');
$result1_num = mysqli_num_rows($result1);
for($i=0;$i<$result1_num;$i++){
    $result1_arr = mysqli_fetch_assoc($result1);
}
$email = $result1_arr['email'];
//$password = $_POST['#p'];
$password = $_POST['p'];
    $result = mysqli_query($conn,"SELECT * FROM users WHERE email = '".$email."'");
    $result_num = mysqli_num_rows($result);
    for($i=0;$i<$result_num;$i++){
        $result_arr = mysqli_fetch_assoc($result);
    };
    if(mysqli_query($conn,"UPDATE users SET password= '".$password."' WHERE email = '".$email."'")){
        echo '<h3 style="text-align: center">修改成功！正在等待跳转...</h3>';
        header("refresh:1;url=login.html");
    }
