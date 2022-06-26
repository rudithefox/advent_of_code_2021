<?php

// Gets the full ranges of numbers we need to consider & marks them
function drawAndMark($set)
{
    $x_range = range($set[0][0], $set[1][0]);
    $x_range = range($set[0][1], $set[1][1]);
    echo $set[0][0];
    echo $set[1][0];
var_dump($x_range);
    //$y_range = 
    //$hits[$value] = $hits[$value] + 1;
}

// Returns points where there are $num amount of lines
function getOccurrances($num)
{
    
}

// Get input & seperate by new line
$file = file_get_contents(__DIR__ . "/input.txt");
$lines = explode("\n", $file);

// Assign a number to each point
$numbers = range(1, (1000*1000));
$map = array_chunk($numbers, 1000, false);

// Go through each line, put the sets into arrays &
foreach ($lines as $lines_key => $line) {
    $rule = explode('->', $line);
    $start_pos = explode(',', $rule[0]);
    $end_pos = explode(',', $rule[1]);
    drawAndMark([$start_pos, $end_pos]);
}