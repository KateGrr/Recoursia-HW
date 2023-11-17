<?php

//Написать функцию, принимающую в качестве аргумента массив и возвращающая с этого массива массив с только четными числами.

$arr3 = [1, 3, 20, 0, 34, 5, 6, 7, 98];

function arrayEven($arr) {
  $evens = [];
  for ($i=0; $i < count($arr); $i++) {
    if($arr[$i] % 2 == 0) {
      $evens[] = $arr[$i];
    }
  }
  return $evens;
}

print_r(arrayEven($arr3));