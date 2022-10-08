<?php

// Get input & seperate by comma
$file = file_get_contents(__DIR__ . "/input.txt");
$crab_subs = explode(",", $file);

$horizontal_pos = 0;
$highest_position = max($crab_subs); // Get the maximum horizontal crustacean submersible position.

$total_travel_arr = [];
while ($horizontal_pos <= $highest_position) { // Loop & increase the horizontal position until we've met the maximum.
    $travel = 0;
    foreach ($crab_subs as $key => $crab_pos) {
        // Increase the travel if the crab's position is more or less than the current position
        if ((int) $crab_pos > (int) $horizontal_pos) {
            $travel = $travel + $crab_pos - $horizontal_pos;
        } elseif ((int) $crab_pos < (int)$horizontal_pos) {
            $travel = $travel + $horizontal_pos - $crab_pos;
        }
    }
    $total_travel_arr[$horizontal_pos] = $travel; // Add the travel of each position to an array
    $horizontal_pos++;
}

echo min($total_travel_arr);// Ouput the most efficient