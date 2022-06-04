<?php

$file = file_get_contents(__DIR__ . "/input.txt");
$elements = explode("\n", $file);

foreach ($elements as $key => $element) {
    $sets[] = [$element, $elements[$key+1], $elements[$key+2]];
}

$count = 0;
foreach ($sets as $key => $set) {
    if ($key > 0) {
        if (count($set) == 3 && count($sets[$key-1]) == 3 && array_sum($set) > array_sum($sets[$key-1])) {
            $count++;
        }
    }
}

echo $count;