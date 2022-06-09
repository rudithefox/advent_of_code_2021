<?php

function createMap($boards)
{
    foreach ($boards as $key => $board) {
        $rows = explode("\n", $board);
        foreach ($rows as $row_key => $row) {
            $chars = explode(" ", $row);
            $chars = array_filter($chars, function ($char) {
                if ($char !== "") {
                    return true;
                };
            });
            $board_map[$key][$row_key] = array_values($chars);
        }
    }
    return $board_map;
}

function winCheck($map, $num, $row_key)
{
    $vertical_win = 0;
    $column_key = array_search($num, $map[$row_key], true);
    foreach ($map as $key => $row) {
        if (array_search($column_key, array_keys($row))) {
            $vertical_win++;
            if ($vertical_win == 5) {
                return [true, $map, $num];
            }
        }
    }

    $horizontal_win = array_filter($map, function ($row) {
        return (count($row) == 5 ? true : false);
    });
    if ($horizontal_win) {
        return [true, $map, $num];
    }
}

function calculateScore($mark_map, $board_map, $final_number)
{
    foreach ($board_map as $key => $array) {
        foreach ($array as $key => $char) {
            $board_map_array[] = $char;
        }
    }

    foreach ($mark_map as $key => $array) {
        foreach ($array as $key => $char) {
            $mark_map_array[] = $char;
        }
    }

    $unmarked = array_diff($board_map_array, $mark_map_array);
    $unmarked = array_sum($unmarked);

    echo "Final score: " . ($unmarked * $final_number);
}

# Work in progress
$file = file_get_contents(__DIR__ . "/input.txt");
$boards = explode("\n\n", $file);

$sequence = array_shift($boards);
$sequence = explode(',', $sequence);

//var_dump($board_map);
$sequence_num = 0;
$win = false;
$mark = [];

$board_map = createMap($boards);

while ($sequence_num < count($sequence)) {
    $num = $sequence[$sequence_num];
    foreach ($board_map as $board_key => $board) {
        foreach ($board as $row_key => $row) {
            $return = array_search($num, $row, true);
            if ($return === 0 or $return) {
                $mark[$board_key][$row_key][$return] = $row[$return];
                $win = winCheck($mark[$board_key], $num, $row_key);
                if (isset($win[0]) && $win[0]) {
                    exit(calculateScore($win[1], $board_map[$board_key], $num));
                }
            }
        }
    }
    $sequence_num++;
}
