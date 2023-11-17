<?php

//Написать функцию, которая принимает на вход массив и возвращает максимальное число из этого массива.

$arr2 = [1, 3, 20, 0, 34, 5, 6];

function arrayMax($arr) {
  $max = null;
  foreach($arr as $value) {
    if($value > $max) {
      $max = $value;
    }
  }
  return $max;
}

echo arrayMax($arr2);