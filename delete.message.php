<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    search();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
    create();
}
function create(){
    for($i = 1; $i < 75; $i++){
        $array['&lt;img src="arclist/'.$i.'.gif"&gt;'] = "[em_".$i."]";
    }
    $message_result = strtr($_POST['message'], $array);
    $conn = mysqli_connect('localhost','root','');
    mysqli_select_db($conn,'myapp');
    mysqli_query($conn,"DELETE FROM message WHERE message = '$message_result'");
    if(mysqli_errno($conn)){
        echo 'false';
    }else{
        echo $message_result;
    }
//    $result = mysqli_query($conn,'SELECT * FROM message');
//    $dataCount = mysqli_num_rows($result);
//    for($i=0;$i<$dataCount;$i++) {
//        $result_arr = mysqli_fetch_assoc($result);
//        if($result_arr['message'] == $message_result){
//            echo $result_arr['message'].":".$message_result;
//        }
//    }
    }

