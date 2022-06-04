<?php

$file = file_get_contents(__DIR__ . "/input.txt");
$elements = explode("\n", $file);

$count = 0;
foreach ($elements as $key => $element) {
    if ($key > 0) {
        if ($element > $elements[$key-1]) {
            $count++;
        }
    }
}

echo $count;