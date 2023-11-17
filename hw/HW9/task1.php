<?php

// $a = rand(100, 999);
// $b = rand(100, 999);

// echo "a = " . $a . "<br>";
// echo "b = " . $b . "<br>";

// $mult = 0;
// $k = 1;
// $k2 = 1;

// for($i=$b; $i > 0; $i = $i/10) {
//   $sum = 0;
//   $bDigit = $i % 10;
//   $i = $i -$bDigit;
//   for ($j=$a; $j > 0; $j = $j/10) {
//     $aDigit = $j % 10;
//     $sum += $aDigit * $bDigit * $k;
//     $j = $j - $aDigit;
//     $k *= 10;
//   }
//   $k = 1;
//   $mult += $sum * $k2;
//   $k2 *= 10;
//  }

//  echo "a * b = " . $mult . "<br>";

$a = rand(100, 999);
$b = rand(100, 999);

echo "a = " . $a . "<br>";
echo "b = " . $b . "<br>";

$arr = array_fill(0, 6, 0);

$k = 0;
$n = 0;

for ($i = $b; $i > 0; $i = $i / 10) {
  $bDigit = $i % 10;
  $i = $i - $bDigit;
  $k += $n;
  for ($j = $a; $j > 0; $j = $j / 10) {
    $aDigit = $j % 10;
    $j = $j - $aDigit;
    $prod = $aDigit * $bDigit;
    $arr[$k] += $prod % 10;
    if ($arr[$k] >= 10) {
      $arr[$k + 1] += ($arr[$k] - $arr[$k] % 10) / 10;
      $arr[$k] = $arr[$k] % 10;
    }
    $arr[$k + 1] += ($prod - $prod % 10) / 10;
    echo '<pre>';
    print_r($arr);
    echo '<pre>';
    $k++;
  }
  $k = 0;
  $n++;
}

echo "   " . $a . "\nx\n   " . $b  . "\n------\n";
for ($m=count($arr)-1;$m>=0; $m--) {
  echo $arr[$m];
}