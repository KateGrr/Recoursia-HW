<?php

//Дан массив $arr из 10 случайных чисел от 0 до 100. Поменяйте местами максимальный и минимальный элементы.

$arr = [];

for($i = 0; $i < 10; $i++) {
  $arr[$i] = rand(0, 100);
}

echo '<pre>';
print_r($arr);
echo '<pre>';

$min = $arr[0];
$min_key = 0;
$max = null;
$max_key = null;
foreach($arr as $key=>$value) {
  if($value > $max) {
    $max = $value;
    $max_key = $key;
  }
  if($value < $min) {
    $min = $value;
    $min_key = $key;
  }
}

echo "min " . "arr[" .$min_key . "]" . " = " . $min . "<br>";
echo "max " . "arr[" .$max_key . "]" . " = " . $max . "<br>";

$temp = $arr[$min_key];
$arr[$min_key] = $arr[$max_key];
$arr[$max_key] = $temp;

echo '<pre>';
print_r($arr);
echo '<pre>';