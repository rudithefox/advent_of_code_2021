<?php

// Calculate the risk score
function scoreCalc($low_points)
{
    // Check how many "+1"s we need to add, then get the current sum before adding
    $addition = count($low_points);
    $sum = array_sum($low_points);
    $sum = $sum + $addition;

    return $sum;
}

// Get input & seperate by new line
$file = file_get_contents(__DIR__ . "/input.txt");
$lines = explode("\n", $file);

// Split the line characters as well
$sets = array_map(function ($line) {
    return str_split($line);
}, $lines);

// Perform a check on each number of each line 
$low_points = [];
foreach ($sets as $line_key => $line) {
    foreach ($line as $num_key => $number) {
        $comparisons = [];
        // Set the other potential comparisons
        (isset($sets[$line_key - 1][$num_key]) ? $comparisons[] = (int) $sets[$line_key - 1][$num_key] : false); // Above, same pos
        (isset($sets[$line_key][$num_key - 1]) ? $comparisons[] = (int) $sets[$line_key][$num_key - 1] : false); // Before, same line
        (isset($sets[$line_key][$num_key + 1]) ? $comparisons[] = (int) $sets[$line_key][$num_key + 1] : false); // After, same line
        (isset($sets[$line_key + 1][$num_key]) ? $comparisons[] = (int) $sets[$line_key + 1][$num_key] : false); // Below, same pos

        (!empty($comparisons) && $number < min($comparisons) ? $low_points[] = (int) $number : false); // If the number is the lowest compared to adjacent, then insert to array
    }
}

echo scoreCalc($low_points); // Output calculated risk score
