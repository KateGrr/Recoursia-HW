<?php

$t_normal = 20;
$f_normal = 50;

$t = rand(-40, 45);
$f = rand(0, 100);

$dt = $t_normal - $t;
$df = $f_normal - $f;

if ($dt <= -25) {
    $cond = "максимальный";
    $heat = "выключен";
}
elseif ($dt > -25 && $dt <= -15) {
    $cond = "средний";
    $heat = "выключен";
}
elseif ($dt > -15 && $dt <= -8) {
    $cond = "умеренный";
    $heat = "выключен";
}
elseif ($dt > -8 && $dt <= 0) {
    $cond = "минимальный";
    $heat = "выключен";
}
elseif ($dt > 0 && $dt <= 8) {
    $cond = "выключен";
    $heat = "минимальный";
}
elseif ($dt > 8 && $dt <= 15) {
    $cond = "выключен";
    $heat = "умеренный";
}
elseif ($dt > 15 && $dt <= 25) {
    $cond = "выключен";
    $heat = "средний";
}
elseif ($dt > 25) {
    $cond = "выключен";
    $heat = "максимальный";
}

if ($df <= -25) {
    $irrig = "выключен";
    $heat = "средний";
}
elseif ($df > -25 && $df <= -10) {
    $irrig = "выключен";
    $heat = "умеренный";
}
elseif ($df > -10 && $df < 0) {
    $irrig = "выключен";
    $heat = "минимальный";
}
elseif ($df > 0 && $df <= 10) {
    $irrig = "минимальный";
    $heat = "выключен";
}
elseif ($df > 10 && $df <= 25) {
    $irrig = "средний";
    $heat = "выключен";
}
elseif ($df > 25) {
    $irrig = "максимальный";
    $heat = "выключен";
}

echo ("Кондиционер " . $cond . "\nОрошение " . $irrig . "\nОбогреватель " . $heat);