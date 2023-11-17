0-вввввввввввввввввввввв<?php

$br = "<br>";
//echo "" . . $br;

//1.Сгенерировать случайное число в диапазоне от 0 до 1000000.

$a = rand(0, 10000000);
echo "Рандомное число: " . $a . $br;

//2.Собрать число из задачи 1 в обратном порядке.

function numReverse($num) {
  $str = $num . "";
  $reverse = "";

  for ($i = strlen($str) - 1; $i >= 0; $i--) {
    $reverse = $reverse . $str[$i];
  }
  return (int)$reverse;
}

echo "Число наоборот: " . numReverse($a) . $br;

//3.Найти сумму всех цифр числа из задачи 1.

function digitsSum($num) {
  $sum = 0;

  for($i = $num; $i > 0; $i /= 10) {
    $digit = $i % 10;
    $sum += $digit;
    $i = $i - $digit;
  }
  return $sum;
}

echo "Сумма всех цифр: " . digitsSum($a) . $br;

//4.Найти произведение всех цифр числа из задачи 1.

function digitsProduct($num) {
  $prod = 1;

  for($i = $num; $i > 0; $i /= 10) {
    $digit = $i % 10;
    $prod *= $digit;
    $i = $i - $digit;
  }
  return $prod;
}

echo "Произведение всех цифр: " . digitsProduct($a) . $br;

//5.Найти минимальную и максимальную цифры числа из задачи 1.

function digitMaxMin($num) {
  $max = $num % 10;
  $min = $num % 10;
  $num =intdiv($num, 10);

  for($i = $num; $i > 0; $i /= 10) {
    $digit = $i % 10;
    if($digit > $max) {
      $max = $digit;
    }
    if($digit < $min) {
      $min = $digit;
    }
    $i = $i - $digit;
  }
  $arrMaxMin = ["Максимальная" => $max, "Минимальная" => $min];
  return $arrMaxMin;
}

echo "Минимальная и максимальная цифры:";
echo "<pre>";
print_r(digitMaxMin($a));
echo "</pre>";

//6.Собрать в массив все четные цифры числа из задачи 1.

function toEvensArr($num) {
  $evens = [];

  for($i = $num; $i > 0; $i /= 10) {
    $digit = $i % 10;
    if($digit % 2 == 0) {
      $evens[] = $digit;
    }
    $i = $i - $digit;
  }
  return $evens;
}

echo "Четные числа: ";
echo "<pre>";
print_r(toEvensArr($a));
echo "</pre>";

//7.Собрать в массив все нечетные цифры числа из задачи 1.

function toOddsArr($num) {
  $odds = [];

  for($i = $num; $i > 0; $i /= 10) {
    $digit = $i % 10;
    if($digit % 2 != 0) {
      $odds[] = $digit;
    }
    $i = $i - $digit;
  }
  return $odds;
}

echo "Нечетные числа: ";
echo "<pre>";
print_r(toOddsArr($a));
echo "</pre>";


//8.Собрать в массив все простые цифры числа из задачи 1.

function toPrimesArr($num) {
  $primes = [];

  for($i = $num; $i > 0; $i /= 10) {
    $digit = $i % 10;
    if($digit == 2 || $digit == 3 || $digit == 5 || $digit == 7) {
      $primes[] = $digit;
    }
    $i = $i - $digit;
  }
  return $primes;
}

echo "Простые числа: ";
echo "<pre>";
print_r(toPrimesArr($a));
echo "</pre>";

//9.Собрать массив из 30 массивов, каждый из которых представляет из себя массив из 20 массивов с десятью случайными числами.

$array = [];

for($i = 0; $i < 30; $i++) {
  for($j = 0; $j < 20; $j++){
    for($k = 0; $k < 10; $k++){
      $array[$i][$j][$k] = rand(0, 100);
    }
  }
}

// echo "Массив массивов с 10 случайными числами: ";
// echo "<pre>";
// print_r($array);
// echo "</pre>";

//10.Отсортировать в массиве из задачи 9 конечные массивы в порядке убывания.
function quicksort($arr) {
  if(count($arr) < 2) {
    return $arr;
  } else {
    $pivot = $arr[0];
    $less = [];
    $greater = [];
    for($i = 1; $i < count($arr); $i++) {
      if($arr[$i] < $pivot) {
        $less[] = $arr[$i];
      } else if($arr[$i] > $pivot) {
        $greater[] = $arr[$i];
      }
    }
    return array_merge(quicksort($less), [$pivot], quicksort($greater));
  }
}

function sortArray3($arr) {
  for($i = 0; $i < 30; $i++) {
    for($j = 0; $j < 20; $j++){
      $arr[$i][$j] = quicksort($arr[$i][$j]);
    }
  }
  return $arr;
}

// echo "Отсортированный по убыванию массив массивов с 10 случайными числами: ";
// echo "<pre>";
// print_r(sortArray3($array));
// echo "</pre>";

//11.Отсортировать массивы второго уровня в массиве из задачи 9 в порядке убывания значений сумм вложенных в них массивов.

function bubbleSortArraySum2($arr) {
  for($i = 0; $i < count($arr); $i++) {
    $size = count($arr[$i]);
    do {
    $swapped = false;
      for($j = 0; $j < $size - 1; $j++){
        if(array_sum($arr[$i][$j]) < array_sum($arr[$i][$j + 1])){
          $temp = $arr[$i][$j];
          $arr[$i][$j] = $arr[$i][$j + 1];
          $arr[$i][$j + 1] = $temp;
          $swapped =true;
        }
      }
      $size--;
    } while($swapped);
  }
  return $arr;
}

// echo "Отсортированный массив второго уровня по суммам в порядке убывания: ";
// echo "<pre>";
// print_r(bubbleSortArraySum2($array));
// echo "</pre>";


echo "Проверка, верно ли отсортирован массив второго уровня по суммам в порядке убывания:" . $br;
$sortedArr = bubbleSortArraySum2($array);

for($i = 0; $i < 30; $i++) {
  for($j = 0; $j < 20; $j++){
    echo array_sum($sortedArr[$i][$j]) . " ";
  }
  echo $br;
}

echo $br;

//12.Отсортировать массивы первого уровня в массиве из задачи 9 в порядке убывания значений сумм вложенных в них массивов.

//13.Создать массив из 5 элементов, каждый из которых представляет из себя массив из 10 случайных слов из любого текста, при этом каждое слово должно быть с заглавной буквы.