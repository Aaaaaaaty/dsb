
<?php
$birthYear = $_GET['birthYear'];
$month = $_GET['month'];
//print_r($birthYear.$month);
//连接数据库
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'myapp');
$result = mysqli_query($conn,'SELECT * FROM manage');
$result_num = mysqli_num_rows($result);
$result_all =[];
for($i=0;$i<$result_num;$i++){
    $result_arr = mysqli_fetch_assoc($result);
    if($birthYear == $result_arr['birthYear']){
        if($month == $result_arr['month']){
            array_push($result_all, $result_arr);
        }
    }
}
//print_r($result_all);
//转换json格式
$result_json = json_encode($result_all);
echo $result_json;
file_put_contents('income.json',$result_json);

?>