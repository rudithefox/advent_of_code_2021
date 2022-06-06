<?php

// fix map! array keys got messed when we removed empty chars on line 11
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
            $board_map[$key][$row_key][] = $chars;
        }
    }
    return $board_map;
}

function winCheck($map, $boards)
{
    foreach ($map as $board_key => $mark_map) {
        var_dump($board_key);
        var_dump($mark_map);
        $vertical_win = $mark_map;
        array_filter($vertical_win, function ($row) {
            (count($row) >= 5 ? true : false);
        });

        //if ($vertical_win) {
        //    echo 'ween';
        //    return true;
        //}


        //var_dump($mark_map);
        //var_dump($vertical_win);
        //exit();
        //$horizontal_win = array_map(function ($key, $row) {
        //    var_dump($key);
        //    var_dump($row);
        //    
        ///    return ['(array_count_values($row))', ];
        // }, array_keys($mark_map), $mark_map);
        //print_r($horizontal_win);
    }
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

var_dump($board_map);
while (!$win or $sequence_num < count($sequence)) {
    $num = $sequence[$sequence_num];
    foreach ($board_map as $board_key => $board) {
        foreach ($board as $row_key => $row) {
            $return = array_search($num, $row[0]);
            //var_dump($return);
            if ($return) {
                $mark[$board_key][$row_key][$return] = $row[0][$return];
                $win = winCheck($mark, $boards);
                if ($win) {
                    exit('won');
                }
            }
        }
    }
    $sequence_num++;
}
