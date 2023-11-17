<?php

$n = rand (3, 10);
echo $n . "<br>";
$arr1 = [];

$num = 1;
for ($i = 0; $i < $n; $i++) {
  if ($i % 2 == 0){
    for ($k = 0; $k < $n; $k++) {
      $arr1[$i][$k] = $num;
      $num++;
    }
  }
  else {
    for ($k = $n-1; $k >= 0; $k--) {
      $arr1[$i][$k] = $num;
      $num++;
    }
  }
}

echo '<table border=1>';
for ($i = 0; $i < $n; $i++) {
    echo '<tr>';
    for ($k = 0; $k < $n; $k++) {
        echo '<td>' . $arr1[$i][$k] . '</td>';
    }
    echo '</tr>';
}
echo '</table>';