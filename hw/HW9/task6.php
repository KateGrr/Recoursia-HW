<?php

//Дан массив $arr из 10 случайных чисел от -100 до 100. Замените все положительные числа на 1, а все отрицательные на 0;

$arr = [];

for($i = 0; $i < 10; $i++) {
  $arr[$i] = rand(-100, 100);
}

echo '<pre>';
print_r($arr);
echo '<pre>';

for($i = 0; $i < 10; $i++) {
  if($arr[$i] > 0) {
    $arr[$i] = 1;
  } else if($arr[$i] < 0){
    $arr[$i] = 0;
  }
}

echo '<pre>';
print_r($arr);
echo '<pre>';