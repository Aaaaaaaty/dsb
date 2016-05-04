<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    search();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
    create();
}
function search(){
    $conn = mysqli_connect('localhost','root','');
    mysqli_select_db($conn,'myapp');
    $result = mysqli_query($conn,'SELECT * FROM cookie');
    $result_num = mysqli_num_rows($result);
    for($i=0;$i<$result_num;$i++){
        $result_arr = mysqli_fetch_assoc($result);
    }
    echo '{"success":true,"pwd":"'.$result_arr['password'].'"}';
}
