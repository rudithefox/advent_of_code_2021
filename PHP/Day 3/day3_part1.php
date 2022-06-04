<?php

$file = file_get_contents(__DIR__ . "/input.txt");
$binaries = explode("\n", $file);

$gamma = "";
$epsilon = "";

$column_sets = [];
foreach ($binaries as $key => $binary) {
    $set = str_split($binary);
    foreach ($set as $key => $number) {
        $column_sets[$key][] = $number;
    }
}

foreach ($column_sets as $key => $column) {
    $freqs = array_count_values($column);
    if ($freqs[0] > $freqs[1]) {
        $gamma .= (string) 1;
        $epsilon .= (string) 0;
    } else {
        $epsilon .= (string) 1;
        $gamma .= (string) 0;
    }
}

var_dump($epsilon);
var_dump($gamma);

$total = (bindec($epsilon) * bindec($gamma));

echo $total;