<?php

# Work in progress
$file = file_get_contents(__DIR__ . "/input.txt");
$boards = explode("\n\n", $file);

$sequence = array_shift($boards);
$sequence = explode(',', $sequence);

foreach ($boards as $key => $board) {
    $rows = explode("\n", $board);
    foreach ($rows as $row_key => $row) {
        $chars = explode(" ", $row);
        $chars = array_filter($chars, function ($char) {
            if ($char !== "") {
                return true;
            };
        });
        $board_map[$key][$row_key][] = $chars;
    }
}

$sequence_num = 0;
$win = false;
while (!$win) {
    $num = $sequence[$sequence_num];
    foreach ($board_map as $key => $board) {
        foreach ($board as $key => $row) {
            if (in_array($num, $row)) {
            }
        }
    }
}