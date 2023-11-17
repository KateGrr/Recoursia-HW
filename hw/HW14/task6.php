<?php
/*
Описать функцию timeToHMS($time), определяющую по времени $time (в секундах) содержащееся в нем количество часов, минут и секунд.
Пример: $time = 3070
00:51:10
*/

$time = rand(1, 86400);
echo "{$time} секунд это ";

function timeToHMS($time) {
  $hours = intdiv($time, 3600);
  if ($hours < 10) {
    $hours = "0{$hours}";
  }
  $minutes = intdiv($time % 3600, 60);
  if ($minutes < 10) {
    $minutes = "0{$minutes}";
  }
  $seconds = $time % 3600 % 60;
  if ($seconds < 10) {
    $seconds = "0{$seconds}";
  }
  return "{$hours}:{$minutes}:{$seconds}";
}

echo(timeToHMS($time));