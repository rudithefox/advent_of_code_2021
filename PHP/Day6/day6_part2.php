<?php

// Trying to use method from Part 1 here was very inefficient. Changed the approach to try reduce size of numbers by working with the frequencies instead.
// Used GMP library for big numbers. 

function nextDay($fish_frequency)
{
    ksort($fish_frequency); // Sort the array by key
    $new_fish = 0;
    foreach ($fish_frequency as $key => $number_of_entries) {
        if ($key == 0) {
            $new_fish = $number_of_entries; // Used to set new fish (8 days) & reset the days for the fish that just created (6 days)
            $fish_frequency[$key] = 0;
        } else {
            $fish_frequency[$key-1] = $number_of_entries;
            $fish_frequency[$key] = 0;
        }
    }
    
    // Set new fish & reset fish
    $reset_fish = $new_fish;
    $fish_frequency[8] = $new_fish;
    $fish_frequency[6] = (isset($fish_frequency[6]) ? gmp_add($fish_frequency[6], $reset_fish) : $reset_fish);
    
    return $fish_frequency;
}

// Get input & separate by new line
$file = file_get_contents(__DIR__ . "/input.txt");
$fish_frequency = array_count_values(explode(",", $file)); // Get the frequency of fish with x amount of days left

$day = 0;
while ($day < 256) { // Loop until 256 days have passed.
    $fish_frequency = nextDay($fish_frequency);
    $day++;
}

$total = 0;
foreach ($fish_frequency as $key => $value) {
    $total = gmp_add($value, $total);
}

echo $total; // Output the total number of fish