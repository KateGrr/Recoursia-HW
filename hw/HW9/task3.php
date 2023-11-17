<?php

$arr = [];
$arr1 = [];
for($i = 0; $i < 10; $i++) {
  $arr[$i] = rand(-100, 100);
  if ($arr[$i] < 0) {
    $arr1[] = $arr[$i];
  }
}

echo '<pre>';
print_r($arr);
echo '<pre>';

echo '<pre>';
print_r($arr1);
echo '<pre>';