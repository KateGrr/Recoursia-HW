<?php

//Написать функцию, принимающую в качестве аргумента целое число и возвращающая массив чисел, на которые это число делится без остатка. Вывести результат на экран со случайным числом.

$n = rand(10, 100);

function numDividers($num) {
  $dividers = [1];
  for($i = 2; $i < $num; $i++) {
    if($num % $i == 0) {
      $dividers[] = $i;
    }
  }
  $dividers[] = $num;
  return $dividers;
}

echo "Делители числа " . $n . ": ";
foreach(numDividers($n) as $value) {
  echo $value . " ";
}