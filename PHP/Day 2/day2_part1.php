<?php

$file = file_get_contents(__DIR__ . "/input.txt");
$events = explode("\n", $file);

$depth = 0;
$hor_pos = 0;

foreach ($events as $key => $event) {
    $pair = explode(' ', $event);
    switch ($pair[0]) {
        case 'forward':
            $hor_pos = $hor_pos + $pair[1];
            break;
        case 'up':
            $depth = $depth - $pair[1];
            break;
        case 'down':
            $depth = $depth + $pair[1];
            break;
    }
}

$total = ($depth*$hor_pos);

echo $total;