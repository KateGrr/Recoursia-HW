<?php
/*
Написать функцию проверяющую строку на палиндром.
На дом, сдать до 19.08.2023
*/
$string = "8901398";
$string1 = "95677659";
$string2 = "ABNNBA";
$string3 = "ABnNBA";

function isPalindrome($string) {
  $is_palindrome = true;
  for($i=0; $i < strlen($string)/2; $i++) {
    if ($string[$i] != $string[strlen($string) - 1 - $i]) {
      $is_palindrome = false;
      break;
    }
  }
  if ($is_palindrome) {
    return $string . " это палиндром";
  } else {
    return $string . " не палиндром";
  }
}

echo isPalindrome($string) . "<br>";
echo isPalindrome($string1) . "<br>";
echo isPalindrome($string2) . "<br>";
echo isPalindrome($string3) . "<br>";