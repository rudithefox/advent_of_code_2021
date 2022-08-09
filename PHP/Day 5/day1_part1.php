<?php

// Gets the full ranges of numbers we need to consider & marks them
function drawAndMark($set, $hits)
{
    // Check if the line is vertical or horizontal
    if ($set[0][0] == $set[1][0] || $set[0][1] == $set[1][1]) {

        if ($set[0][0] == $set[1][0]) {
            $move = range($set[0][1], $set[1][1]);

        } else {
            $move = range($set[0][0], $set[1][0]);
            foreach ($move as $key => $position) {
                $hits[$position][$set[0][0]] = (isset($hits[$position][$set[0][0]]) ? $hits[$position][$set[0][0]] + 1 : 1);
            }
        }

    }
}

// Returns points where there are $num amount of lines
function getOccurrances($num)
{
}

$hits = [];
// Get input & seperate by new line
$file = file_get_contents(__DIR__ . "/input.txt");
$lines = explode("\n", $file);

// Assign a number to each point
$numbers = range(1, (1000 * 1000));
$map = array_chunk($numbers, 1000, false);

// Go through each line, put the sets into arrays &
foreach ($lines as $lines_key => $line) {
    $rule = explode('->', $line);
    $start_pos = explode(',', $rule[0]);
    $end_pos = explode(',', $rule[1]);
    drawAndMark([$start_pos, $end_pos], $hits);
}

var_dump($hits);