<?php

$x = rand(1, 100000);
$y = rand(1, 1000);

for ($i = 1; $i <= $y; $i++) {
  $sum+=$x;
}

echo $x . " * " . $y . " = " . $sum;