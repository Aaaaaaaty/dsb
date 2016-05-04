<?php
$a = '<img src="arclist/1.gif"><img src="arclist/18.gif"><img src="arclist/32.gif"><img src="arclist/69.gif">现在在想什么？';
for($i = 1; $i < 75; $i++){
    $array['<img src="arclist/'.$i.'.gif">'] = "[em_".$i."]";
}
$message_result = strtr($a, $array);
echo $message_result;
?>