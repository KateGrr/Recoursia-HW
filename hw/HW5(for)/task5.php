<?php

$a = rand(1,80);
$b = rand(40, 150);

echo " Нечетные числа от {$a} до {$b}:" . "<br>";

if($a % 2 == 0 && $num < 80) {
  $a = $a+1;
}

for($i = $a; $i <= $b; $i+=2) {
  echo $i;
  echo "<br>";
}