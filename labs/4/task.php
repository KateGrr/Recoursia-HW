<?php
/*
Написать функцию, которая принимает на вход число и возвращает массив состоящий из двух массивов, в первом только четные цифры, во втором нечетные.
На дом, сдать до 26.08.2023
*/

$num = rand(1000, 999999);
echo "number = {$num}" . "<br>";

function numToEvensAndOdds($num) {
  $evens = [];
  $odds = [];
  while ($num > 0) {
    $digit = $num % 10;
    if ($digit % 2 == 0) {
      $evens[] = $digit;
    } else {
      $odds[] = $digit;
    }
    $num = ($num - $digit)/10;
  }
  return [$evens, $odds];
}

echo "<pre>";
print_r(numToEvensAndOdds($num));
echo "</pre>";