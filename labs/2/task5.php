<?php

$arr4 = [];
$limit = rand(5, 10);
$countMinus = 0;
$countPlus = 0;

for ($i = 0; $i < $limit; $i++) {
    $arr4[$i] = rand(-100, 100);
    if ($arr4[$i] < 0) {
      $countMinus++;
    }
    elseif ($arr4[$i] > 0) {
      $countPlus++;
    }
}

echo '<pre>';
print_r($arr4);
echo '</pre>';

if($countPlus > $countMinus) {
  echo $countPlus . " положительных элементов " . " > " . $countMinus . " отрицательных";
} else if($countPlus < $countMinus) {
  echo $countMinus . " отрицательных элементов " . " > " . $countPlus . " положительных";
} else {
  echo $countPlus . " положительных элементов " . " = " . $countMinus . " отрицательных элементов";
}