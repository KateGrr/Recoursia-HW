<?php

$num = rand(1, 70);

if($num % 2 == 0 && $num < 70) {
  $num = $num+1;
}

echo " Нечетные числа от {$num} до 70:" . "<br>";
for($i = $num; $i < 70; $i+=2) {
  echo $i;
  echo "<br>";
}