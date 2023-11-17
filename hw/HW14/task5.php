<?php
/*
Описать функцию addRightDigit($a, $b), добавляющую к целому положительному числу $a справа цифру $b ($b лежит в диапазоне 0–9).
Пример:
   $a = 708; $b = 2;
   addRightDigit($a,$b) - должна вернуть 7082
 */
$a = rand(1, 1000);
$b = rand(0, 9);
echo $a . "<br>";
echo $b . "<br>";

function addRightDigit($a, $b) {
  return ($a * 10 + $b);
}

echo addRightDigit($a, $b);