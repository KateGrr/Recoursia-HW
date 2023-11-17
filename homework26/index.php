<?php

$br = "<br>";

//1.Собрать строку из 10 случайных символов английского алфавита. Вывести на экран эту строку таким образом, чтобы все символы с четным порядковым номером (алфавитного порядка) были выделены жирным.

//условие я поняла так, что буквы b, d, f, h, j, l, n, p, r, t, v, x, z должны быть выделены жирным

//Первый способ, на мой взгляд оптимальный:

$abc = "abcdefghijklmnopqrstuvwxyz"; 
$len = 10;

function abcRandomEvensBold($length) 
{
    $abc = "abcdefghijklmnopqrstuvwxyz"; 
    $str = '';
    for ($i = 0; $i < $length; $i++) {
        $order = rand(0, mb_strlen($abc)-1);
        if ($order % 2 != 0) { 
            $elem =  '<b>' . mb_substr($abc, $order, 1) . '</b>';
        } else {
            $elem = mb_substr($abc, $order, 1);
        }
        
        $str = $str . $elem; 
    }
    return $str;
}
echo abcRandomEvensBold($len);
echo $br;

//Второй способ: так я дословно поняла ТЗ, ну и возможность попрактиковаться. Первая функция собирает строку из 10 символов, Вторая функция выделяет нужные буквы жирным. Осознанно делала способом отличным от видео (там через mb_substr() решается подобная проблема)


function abcRandom($length)
{
    $abc = "abcdefghijklmnopqrstuvwxyz"; 
    $str = '';
    for ($i = 0; $i < $length; $i++) {   
        $elem = mb_substr($abc, rand(0, mb_strlen($abc)-1), 1);
        $str = $str . $elem; 
    }
    return $str;
}

$str = abcRandom($len);

function abcEvensBold($string)
{
    $search = "bdfhjlnprtvxz";
    $arr = str_split($string);
    $result = "";
    foreach($arr as $elem) {
        if(str_contains($search, $elem)) {
            $result = $result . '<b>' . $elem . '</b>';
        } else {
            $result = $result . $elem;
        }
    }
    return $result;
}

echo abcEvensBold($str);
echo $br;


//2.Собрать строку из 10 случайных символов латинского алфавита. Вывести на экран эту строку таким образом, чтобы все гласные были в верхнем регистре, а все согласные выделены курсивом. Обратите внимание на букву Y.


function abcVowelsUpConsItalic($string) 
{
    $vowels = "aeiou";
    $arr = str_split($string);
    $result = "";
    foreach($arr as $elem) {
        if(str_contains($vowels, $elem)) {
            $result = $result . mb_strtoupper($elem);
        } else {
            $result = $result . '<i>' . $elem . '</i>';
        }
    }
    return $result;
    
}

echo abcVowelsUpConsItalic($str);
echo $br;

//3.Реализуйте функцию (translit), которая переводит все символы русского алфавита входящей строки в символы английского алфавита и возвращает её.

$abcru = "аАбБвВгГдДеЕёЁжЖзЗиИйЙкКлЛмМнНоОпПрРсСтТуУфФхХцЦчЧшШщЩъЪыЫьЬэЭюЮяЯ";
$teststr = "Я тестовая строка. ПРИВЕТ!";

function translit($rustring)
{
    $arrTr = [
        'а' => 'a', 'А' => 'A',
        'б' => 'b','Б' => 'B',
        'в' => 'v', 'В' => 'V',
        'г' => 'g','Г' => 'G',
        'д' => 'd','Д' => 'D',
        'е'=> 'e','Е'=> 'E',
        'ё'=> 'yo','Ё'=> 'YO',
        'ж'=> 'zh','Ж'=> 'ZH',
        'з'=> 'z','З'=> 'Z',
        'и'=> 'i','И'=> 'I',
        'й'=> 'j','Й'=> 'J',
        'к'=> 'k','К'=> 'K',
        'л'=> 'l','Л'=> 'L',
        'м'=> 'm','М'=> 'M',
        'н'=> 'n','Н'=> 'N',
        'о'=> 'o','О'=> 'O',
        'п'=> 'p','П'=> 'P',
        'р'=> 'r','Р'=> 'R',
        'с'=> 's','С'=> 'S',
        'т'=> 't','Т'=> 'T',
        'у'=> 'u','У'=> 'U',
        'ф'=> 'f','Ф'=> 'F',
        'х'=> 'h','Х'=> 'H',
        'ц'=> 'c','Ц'=> 'C',
        'ч'=> 'ch','Ч'=> 'CH',
        'ш'=> 'sh','Ш'=> 'SH',
        'щ'=> 'shch','Щ'=> 'SHCH',
        'ъ'=> '\'','Ъ'=> '\'',
        'ы'=> 'y','Ы'=> 'Y',
        'ь'=> '\'','Ь'=> '\'',
        'э'=> 'eh','Э'=> 'EH',
        'ю'=> 'yu','Ю'=> 'YU',
        'я'=> 'ya','Я'=> 'YA'
    ];

    return strtr($rustring, $arrTr);
}

echo translit($abcru);
echo $br;
echo translit($teststr);
echo $br;

//4.Дано 10-значное случайное число, необходимо преобразовать данное число в строку по следующему сценарию: сначала подбирается соответствующий символ из английского алфавита под двузначный номер, если такое возможно, иначе под однозначный номер. 
//В качестве примера рассмотрим шестизначное число:
//132722 = 13(n) - 2(c) - 7(h) - 22(w) = nchw

$randnum = rand(1000000000, 9999999999);

function numToAbc($num) {
    $numstr = strval($num);
    $abc = "abcdefghijklmnopqrstuvwxyz";
    $result = "";
    
    while(mb_strlen($numstr) > 0) {
        $pos = mb_substr($numstr, 0, 2);
        if(intval($pos) < 26 && mb_substr($numstr, 0, 1) != 0) {
            $result = $result . $abc[$pos];
        } else {
            $pos = mb_substr($numstr, 0, 1);
            $result = $result . $abc[$pos];
        }
        $numstr = mb_substr($numstr, mb_strlen($pos));
    }

    return $result;
}

echo $randnum . ' = ';
echo numToAbc($randnum);

/*5.Собрать массив $arr из 10 элементов, каждый из которых представляет из себя строку из случайных символов латинского алфавита. 
И далее необходимо:

1.Заменить все символы во всех элементах массива $arr  на их порядковые номера латинского алфавита (bac - 102).
2.Собрать сумму всех цифр в массив $sum.
3.В массиве $sum каждое число преобразовать в строки по следующему сценарию: сначала подбирается соответствующий символ под двузначный номер если такое возможно, далее под однозначный номер. К примеру:
132722 = 13(n) - 2(c) - 7(h) - 22(w) = nchw
4.Объединить все полученные строки массива $sum в одну единую строку.
*/

function abcRandToArr($arrlen, $strlen) {
    for($i = 0; $i < $arrlen; $i++) {
        $arr[$i] = abcRandom($strlen);
    }
    return $arr;
}

$abcarr = (abcRandToArr(10, 15));
var_dump($abcarr);

function abcToNum($str) {
    $abc = "abcdefghijklmnopqrstuvwxyz";
    $numstr = "";
    while(mb_strlen($str)>0) {
        $pos = mb_substr($str, 0, 1);
        $numstr = $numstr . mb_strpos($abc, $pos);
        $str = mb_substr($str, 1);
    }
    return $numstr; 
}

function arrToNum($arr) {
    $result = [];
    foreach($arr as $elem) {
        $result[] = abcToNum($elem);
    }
    return $result;
}

$numarr = arrToNum($abcarr);
var_dump($numarr);

function numArrToSum($numarr) {
    $result = [];
    foreach($numarr as $elem) {
        $result[] = array_sum((str_split($elem)));
    }
    return $result;
}

$sum = numArrToSum($numarr);
var_dump($sum);

function numArrToAbc($numarr) {
    $result = [];
    foreach($numarr as $elem) {
        $result[] =  numToAbc($elem);
    }
    return $result;
}

$newabcarr = numArrToAbc($sum);
var_dump($newabcarr);

function arrToStr($arr) {
    $result = "";
    foreach($arr as $elem) {
        $result = $result . $elem;
    }
    return $result;
}

$resultstr = arrToStr($newabcarr);
echo $resultstr;

/*
У вас есть список операций: 

Увеличить на (increaseBy) - увеличивает значение на заданное количество
Уменьшить на  (reduceBy) - уменьшает значение на заданное количество
Увеличить в (increaseByTimes) - увеличивает значение в заданное количество раз
Уменьшить в (reduceByTimes) - уменьшает значение в заданное количество раз
Необходимо:

1.Собрать список ($operations), представляющий из себя случайную последовательность 5-ти операций;
2.Применить последовательность операций ($operations) к числу 10, заданный аргумент каждой операции соответствует порядковому номеру самой операции + 1
3.Собрать 2 массива из 10 случайных чисел. Применить к каждому элементу первого массива последовательность операций ($operations), в качестве заданного аргумента каждой операции использовать соответствующий элемент из второго массива.
*/

/* function increaseBy($num, $value) {
    return $num + $value;
}

function reduceBy($num, $value) {
    return $num - $value;
}

function increaseByTimes($num, $value) {
    return $num * $value;
}

function reduceByTimes($num, $value) {
    return $num / $value;
} */

$functions = [
    'increaseBy' => fn($num, $value) => $num + $value,
    'reduceBy' => fn($num, $value) =>  $num - $value,
    'increaseByTimes' => fn($num, $value) => $num * $value,
    'reduceByTimes' => fn($num, $value) => $num / $value
];

foreach($functions as $elem) {
    $functionsorder[] = $elem;
}

for($i = 0; $i < 5; $i++) {
    $operations[] = $functionsorder[rand(0, 3)];
}

for($i = 0; $i < 5; $i++) {
    $arr10[] = $operations[$i](10, $i + 1);
 };

 var_dump($arr10);

 for($i = 0; $i < 10; $i++) {
    $arr1[] = rand(0, 100);
    $arr2[] = rand(1, 100);
 }

 var_dump($arr1) . $br;
 var_dump($arr2) . $br;


 for($i = 0; $i < count($arr1); $i++) {
    for($k = 0; $k < count($operations); $k++) {
        $resultarr[$i][$k] = $operations[$k]($arr1[$i], $arr2[$i]);
    }  
 }

 var_dump($resultarr);
 