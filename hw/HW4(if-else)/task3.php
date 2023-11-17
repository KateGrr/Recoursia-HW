<?php

$randIndex = random_int(1, 5);

if ($randIndex == 1) {
    $s = random_int(0, 11);
}
elseif ($randIndex == 2) {
    $s = random_int(12, 50);
}
elseif ($randIndex == 3) {
    $s = random_int(50, 90);
}
elseif ($randIndex == 4) {
    $s = random_int(90, 500);
}
elseif ($randIndex == 5) {
    $s = random_int(500, 2500);
}

$layer = "";

 if ($s >= 0 && $s < 12){
   $layer = "Тропосфера (0-12км)";
 }
 elseif ($s >= 12 && $s < 50){
  $layer = "Стратосфера (12-50км)";
 }
 elseif ($s >= 50 && $s < 90){
  $layer = "Мезосфера (50-90км)";
 }
 elseif ($s >= 90 && $s < 500){
  $layer = "Термосфера (90-500км)";
 }
 elseif ($s >= 500 && $s < 2500){
  $layer = "Экзосфера (500-2500км)";
 }

 echo "Высота: {$s}км - это {$layer}";