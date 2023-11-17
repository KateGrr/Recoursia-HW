<?php

$arr = [];
$product =  1;
for($i = 0; $i < 10; $i++) {
  $arr[$i] = rand(1, 10);
  $product *= $arr[$i];
}
echo '<pre>';
print_r($arr);
echo '<pre>';
echo "Произведение элементов массива = " . $product;