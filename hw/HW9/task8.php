<?php

//Дан массив $arr из 20 случайных чисел (0 или 1). Найдите длину самой длинной цепочки повторяющихся чисел в данном массиве.
//К примеру в массиве [0, 0, 1, 1, 0, 0, 0, 0, 1, 1, 0], длина самой длинной цепочки будет 4 .

$arr = [];
$arr_max = [];
$arr1 = [];
$max_length = 0;

for($i = 0; $i < 20; $i++) {
  $arr[$i] = rand(0, 1);
}

echo '<pre>';
print_r($arr);
echo '<pre>';

for($i = 0; $i < 20; $i++) {
  if ($arr[$i] === $arr[$i+1]) {
    $arr1[] = $value;
  }
  if ($arr[$i] !== $arr[$i+1]) {
    $arr1[] = $value;
    if (count($arr1) > count($arr_max)) {
      $arr_max = $arr1;
      $max_lenght = count($arr_max);
    }
    unset($arr1);
    $arr1 = [];
  }
}

echo "Самая длинная цепочка из " . $max_lenght . " чисел";