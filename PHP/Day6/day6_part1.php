<?php

function nextDay($fish)
{
    foreach ($fish as $key => $days_left) {
        if ((int) $days_left == (int) 0) {
            $fish[$key] = 6; // Reset the days for the fish
            $fish[] = 8; // Add a new fish with 7 days (8 including 0) 
        } else {
            $fish[$key] = $days_left - 1;
        }
    }
    return $fish;
}

// Get input & separate by new line
$file = file_get_contents(__DIR__ . "/input.txt");
$fish = explode(",", $file);

$day = 0;
while ($day < 80) { // Loop until 80 days have passed.
    $fish = nextDay($fish);
    $day++;
}

echo count($fish); // Output the total number of fish