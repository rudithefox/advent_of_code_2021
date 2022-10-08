<?php

// Digits with unique segment numbers
$digit_count = [
    1 => 2,
    4 => 4,
    7 => 3,
    8 => 7
];

// Get input & seperate by new line
$file = file_get_contents(__DIR__ . "/input.txt");
$lines = explode("\n", $file);

$hits = 0;
foreach ($lines as $key => $line) {
    // Only check the values after the pipe
    $set = explode("|", $line);
    $output = explode(" ", $set[1]);

    // Go through each value and increase $hits if the length is in $digit_count
    foreach ($output as $output_key => $digit) {
        in_array(strlen($digit), $digit_count) ? $hits++ : $hits;
    }
}

echo $hits;