<?php

// Get input & seperate by new line
$file = file_get_contents(__DIR__ . "/input.txt");
$crab_subs = explode(",", $file);

$horizontal_position = 0;
$highest_position = max($crab_subs); // Get the maximum horizontal crustacean submersible position.

$total_travel_array = [];
while ($horizontal_position <= $highest_position) { // Loop & increase the horizontal position until we've met the maximum.
    $travel = 0;
    foreach ($crab_subs as $key => $crustacean_submariner_pos) {
        // Increase the travel if the crab's position is more or less than the current position
        if ((int) $crustacean_submariner_pos > (int) $horizontal_position) {
            $travel = $travel + $crustacean_submariner_pos - $horizontal_position;
        } elseif ((int) $crustacean_submariner_pos < (int)$horizontal_position) {
            $travel = $travel + $horizontal_position - $crustacean_submariner_pos;
        }
    }
    $total_travel_array[$horizontal_position] = $travel; // Add the travel of each position to an array
    $horizontal_position++;
}

echo min($total_travel_array);// Ouput the most efficient