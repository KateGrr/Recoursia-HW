<?php

//Написать функцию, принимающую на вход массив и возвращающую сумму всех чисел этого массива.

$arr1 = [1, 3, 20, 0, 34, 5, 6];

function arraySum($arr)
{
  $sum = 0;
  foreach($arr as $value) {
    $sum += $value;
  }
  return $sum;
}

echo arraySum($arr1);