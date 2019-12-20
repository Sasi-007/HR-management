<?php
  $final=0; 
  $i=2;
while($i>=1)
{
  $time1 = strtotime('11:30');
 $time2 = strtotime('17:45');
 if($time2 < $time1) 
 {
    $time2 += 24 * 60 * 60;
 }
	$minutes= ($time2 - $time1) / 60; 
	$hours = intdiv($minutes, 60).'.'. ($minutes % 60);
    $final+=$hours;	
    echo $final;
    $i--;
 
}	
?>