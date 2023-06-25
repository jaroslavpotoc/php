<?php
$n = 7;

for ($i = 1; $i < $n; $i++){
    echo str_repeat("*", $i);
    echo "<br>";
}
echo "<br>";
// naopak
$f = 7;
for ($i = $f; $i >= 1; $i--){
    echo str_repeat("*", $i);
    echo "<br>";
}