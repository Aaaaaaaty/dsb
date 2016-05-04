<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    search();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
    create();
}
function search(){
    $conn = mysqli_connect('localhost','root','');
    mysqli_select_db($conn,'myapp');
    $result = mysqli_query($conn,'SELECT * FROM clock');
    $result_num = mysqli_num_rows($result);
    for($i=0;$i<$result_num;$i++){
        $result_arr = mysqli_fetch_assoc($result);
    }
    echo '{"success":true,
            "month":"'.$result_arr['month'].'",
            "day":"'.$result_arr['day'].'",
            "hour":"'.$result_arr['hour'].'",
            "min":"'.$result_arr['min'].'",
            "sec":"'.$result_arr['sec'].'",
            "music":"'.$result_arr['music'].'",
            "sort":"'.$result_arr['sort'].'",
            "year":"'.$result_arr['year'].'"}';
}
?>