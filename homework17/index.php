<?php

// Написать функцию divisors(...), которая принимает на вход число $n и выводит список всех его делителей через запятую. Решить задачу с помощью рекурсии.
// Например divisors(6): 1,2,3,6

function divisors($n, $div = 1) {
    if ($n == 0) { 
        echo "0"; 
        return; 
    }
    if($div < $n) {
        if($n % $div == 0) {
            echo $div . ", ";
        }
        divisors($n, $div+1);
    } else {
        echo $div;
        return;
    }
}

echo "Делители числа 6: "; 
divisors(6);
echo "<br>";
echo "Делители числа 10: "; 
divisors(10);
echo "<br>";
echo "Делители числа 13: "; 
divisors(13);
echo "<br>";
echo "Делители числа 1: "; 
divisors(1);
echo "<br>";
echo "Делители числа 0: "; 
divisors(0);
echo "<br>";

//2. Написать функцию isHappyNumber(...), которая принимает на вход шестизначное число, 
//и возвращает true если число является счастливым (когда сумма первых трех цифр равна сумме последних), 
//иначе возвращает false. Решить задачу с помощью рекурсии.

 function isHappyNumber($n, $sum1 = 0, $sum2 = 0) { 
    
    $last = $n % 10;
    
    if ($n > 1000) {
        return isHappyNumber(($n - $last)/10, $sum1+=$last, $sum2+=0);
    } elseif ($n > 0) {
        return isHappyNumber(($n - $last)/10, $sum1+=0, $sum2+=$last);
    } else {
        echo "final sum1=" . $sum1 . "<br>";
        echo "final sum2=" . $sum2 . "<br>";
        return ($sum1 == $sum2) ? true : false;
    }  
}

echo "<br>";
$number = rand(100000, 999999);
// $number = 123321;
// $number = 100000;
// $number = 999999;
echo (isHappyNumber($number)) ? $number . " счастливое" . "<br>": $number . " обычное" . "<br>";

//Написать функцию, принимающую на вход число $n и возвращающая сумму его цифр. Решить задачу с использованием рекурсии (без циклов).

function sumOfDigits ($n, $sum = 0) {
    if ($n > 0) {
        $digit = $n % 10;
        return sumOfDigits(($n - $digit)/ 10, $sum+=$digit);
    }
    return $sum;
}

echo "<br>";
$number = rand(100000, 999999);
echo "Сумма цифр числа " . $number . " = " . (sumOfDigits($number));
echo "<br>";

//Написать функцию, которая принимает на вход целое положительное число $n и возвращает массив всех квадратных чисел от 1 до $n. Решить задачу с использованием рекурсии (без циклов).
//К примеру если число $n=27, то результат должен быть массивом: [1, 4, 9, 16, 25];

function arrOfSquares ($n) { 

    $squares = [];
    
    if (sqrt($n) == (int)sqrt($n)) {
        $squares[] = $n;
    }    
    if ($n > 1) {
        $arr = arrOfSquares ($n-1);
        for ($j = 0; $j < count($arr); $j++) {
            $squares[] = $arr[$j];
        }
    }
    
    return $squares;
}

echo "<br>";
$number = rand(1, 100);
echo "Массив квадратов числа " . $number;
echo "<pre>";
print_r (arrOfSquares($number));
echo "</pre>";
