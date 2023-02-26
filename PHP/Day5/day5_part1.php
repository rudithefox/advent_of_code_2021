<?php

// Gets the full ranges of numbers we need to consider & marks hits.
function drawAndMark($set, $hits)
{
    // Make sure our set doesn't have any spaces
    $set[0][0] = (int) $set[0][0];
    $set[1][0] = (int) $set[1][0];
    $set[0][1] = (int) $set[0][1];
    $set[1][1] = (int) $set[1][1];

    // Check if the line is vertical or horizontal before continuing
    if ($set[0][0] === $set[1][0] || $set[0][1] === $set[1][1]) {

        if ($set[0][0] === $set[1][0]) {
            // Get a range of points to mark & mark them
            $move = range($set[0][1], $set[1][1]);
            foreach ($move as $key => $position) {
                $hits[$set[1][0]][$position] = (isset($hits[$set[1][0]][$position]) ? $hits[$set[1][0]][$position] + 1 : 1);
            }
        } else {
            // Get a range of points to mark & mark them
            $move = range($set[0][0], $set[1][0]);
            foreach ($move as $key => $position) {
                $hits[$position][$set[0][1]] = (isset($hits[$position][$set[0][1]]) ? $hits[$position][$set[0][1]] + 1 : 1);
            }
        }
    }
    return $hits;
}

// Returns number of points that have more than, or equal to, $num amount of intersects
function getOccurrences($hits, $num)
{
    $occurrence = 0;
    foreach ($hits as $key_1 => $value_1) {
        foreach ($value_1 as $key_2 => $value_2) {
            ($value_2 >= $num ? $occurrence++ : null);
        }
    }

    return $occurrence;
}

$hits = [];
// Get input & separate by new line
$file = file_get_contents(__DIR__ . "/input.txt");
$lines = explode("\n", $file);

// Go through each line, put the sets into arrays & draw lines. 
foreach ($lines as $lines_key => $line) {
    $rule = explode('->', $line);
    $start_pos = explode(',', $rule[0]);
    $end_pos = explode(',', $rule[1]);
    $hits = drawAndMark([$start_pos, $end_pos], $hits);
}

$occurrence = getOccurrences($hits, 2);

echo $occurrance;
