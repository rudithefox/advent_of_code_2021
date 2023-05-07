<?php

// Take the travel, create a range from 0 to get the cost for each step, return the sum
function fuelCost($travel)
{
    $range = range(0, $travel);
    $cost = array_sum($range);

    return $cost;
}

// Get input & separate by comma
$file = file_get_contents(__DIR__ . "/input.txt");
$crab_subs = explode(",", $file);

$horizontal_pos = 0;
$highest_position = max($crab_subs); // Get the maximum horizontal crustacean submersible position.

$total_travel_arr = [];
while ($horizontal_pos <= $highest_position) { // Loop & increase the horizontal position until we've met the maximum.
    foreach ($crab_subs as $key => $crab_pos) {
        $travel = 0;
        // Increase the travel if the crab's position is more or less than the current position
        if ((int) $crab_pos > (int) $horizontal_pos) {
            $travel = $travel + $crab_pos - $horizontal_pos; 
            $cost = fuelCost($travel); // Generate the fuel cost based on travel
        } elseif ((int) $crab_pos < (int)$horizontal_pos) {
            $travel = $travel + $horizontal_pos - $crab_pos;
            $cost = fuelCost($travel); // Generate the fuel cost based on travel
        }
        !isset($total_travel_arr[$horizontal_pos]) ? $total_travel_arr[$horizontal_pos] = $cost : $total_travel_arr[$horizontal_pos] += $cost; // Add the cost of each crustacean submersible to an array
    }
    $horizontal_pos++;
}

echo min($total_travel_arr);// Output the most efficient