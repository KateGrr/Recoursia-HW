<?php

$num = rand(100, 999);
$sum = 0;
$prod =  1;

echo "Число " . $num . "<br>";

for ($i = 1; $i <= 3; $i++) {
  $digit = $num % 10;
  $sum += $digit;
  $prod *= $digit;
  $num = intdiv($num, 10);
}

echo "Сумма всех цифр = " . $sum . "<br>";
echo "Произведение всех цифр = " . $prod . "<br>";