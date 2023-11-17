<?php

// $counter = 0;
// for ($i = 100; $i <= 200; $i++) {
//   $divisors = 0;
//   for ($k = 2; $k <= 13; $k++) {
//     if ($i % $k == 0) {
//       $divisors++;
//     }
//   }
//   if ($divisors == 0) {
//     $counter++;
//     echo $i . " ";
//   }
// }
// echo "<br>Всего простых чисел: " . $counter;


//функция принимает значения от a до b, результатом является массив из простых чисел от a до b
function is_prime($a, $b) {
  $arr = array_fill($a, $b-$a, TRUE);
  for ($i = $a; $i <= $b; $i++) {
    if ($i % 2 == 0) {
      $arr[$i] = FALSE;
    }
    else {
      for ($j = 3; $j <= (int)sqrt($b); $j+=2) {
        if ($i % $j == 0) {
          $arr[$i] = FALSE;
        }
      }
    }
  }

  $primes = [];
  foreach($arr as $key => $value) {
    if ($value) {
      $primes[] = $key;
    }
  }
  return $primes;
}


$primes = is_prime(100, 200);

echo '<pre>';
print_r($primes);
echo '<pre>';

echo "<br>Всего простых чисел: " . count($primes);