<?php

$num =rand(100000, 999999);
echo $num . " ";

for ($i = 1; $i <= 3; $i++) {
  $firstSum += $num % 10;
  $num = intdiv($num, 10);
}

for ($i = 1; $i <= 3; $i++) {
  $secondSum += $num % 10;
  $num = intdiv($num, 10);
}

if ($firstSum == $secondSum) {
  echo "счастливое число: " . $secondSum . " = " . $firstSum;
}
else echo "не счастливое число: " . $secondSum . " != " . $firstSum;