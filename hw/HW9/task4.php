<?php

$arr = [];
$evens = [];
$odds = [];
for($i = 0; $i < 10; $i++) {
  $arr[$i] = rand(1, 100);
  if ($arr[$i] % 2 == 0) {
    $evens[] = $arr[$i];
  } else {
  $odds[] = $arr[$i];
  }
}

echo '<pre>';
print_r($arr);
echo '<pre>';

echo "Четные:" . "<br>";
echo '<pre>';
print_r($evens);
echo '<pre>';

echo "Нечетные:" . "<br>";
echo '<pre>';
print_r($odds);
echo '<pre>';