<?php

$digit =rand(1,6);
echo "Знаков в числе: " . $digit . "<br>";
$limit = 999999 % 10 ** $digit;
echo "Числа от 1 до " . $limit . "<br>";
$num = rand(1,$limit);

echo "Цифр в числе " . $num . ": ";
for ($i = 1; $i <= 6; $i++) {
  $num = $num / 10;
  if ($num < 1) {
    echo $i;
    break;
  }
}