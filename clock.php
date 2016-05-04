<?php
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'myapp');
$sort = $_POST['sort'];
$birthYear = $_POST['birthYear'];
$month = $_POST['month'];
$days = $_POST['days'];
$hour = $_POST['hour'];
$min = $_POST['min'];
$sec = $_POST['sec'];
$comment = $_POST['comment'];
$music = $_POST['music'];
if(mysqli_query($conn,"INSERT INTO clock(year,month,day,hour,min,sec,music,sort,comment) VALUE ('$birthYear','$month','$days','$hour','$min','$sec','$music','$sort','$comment')")){
    header("Location:clock.run.html");
}else{
    echo $sort;
    echo $sec;
}
?>