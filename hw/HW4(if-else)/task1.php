<?php

$day = rand(1, 7);
echo("\n");
$myDate= readline("Введите дату своего рождения: ");

$birthDay = ($day + $myDate) % 7 - 1;
$start = '';
$birth = '';

if($birthDay == 1) {
  $birth = 'в понедельник';
}
elseif($birthDay == 2) {
  $birth = 'во вторник';
}
elseif($birthDay == 3) {
  $birth = 'в среду';
}
elseif($birthDay == 4) {
  $birth = 'в четверг';
}
elseif($birthDay == 5) {
  $birth = 'в пятницу';
}
elseif($birthDay == 6) {
  $birth = 'в субботу';
}
elseif($birthDay == 7) {
  $birth = 'в воскресенье';
}

if($day == 1) {
  $start = 'c понедельника';
}
elseif($day == 2) {
  $start = 'со вторника';
}
elseif($day == 3) {
  $start = 'со среды';
}
elseif($day == 4) {
  $start = 'с четверга';
}
elseif($day == 5) {
  $start = 'с пятницы';
}
elseif($day == 6) {
  $start = 'с субботы';
}
elseif($day == 7) {
  $start = 'с воскресенья';
}

echo "Если месяц начнется {$start}, то мой день рождения будет {$birth}.";