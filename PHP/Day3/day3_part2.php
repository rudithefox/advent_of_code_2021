<?php

function getOxygen()
{
    $file = file_get_contents(__DIR__ . "/input.txt");
    $binaries = explode("\n", $file);

    $column_sets = [];
    foreach ($binaries as $key => $binary) {
        $set = str_split($binary);
        foreach ($set as $key => $number) {
            $column_sets[$key][] = $number;
        }
    }

    $column = 0;
    while (count($binaries) > 1) {
        $freqs = array_count_values($column_sets[$column]);
        $common = ($freqs[1] >= $freqs[0] ? 1 : 0);
        foreach ($column_sets[$column] as $key => $value) {
            if ($value != $common) {
                unset($binaries[$key]);
                foreach ($column_sets as $set_key => $column_list) {
                    unset($column_sets[$set_key][$key]);
                }
            }
        }
        $column++;
    }

    $binary = $binaries;

    return $binary;
}

function getCO2()
{
    $file = file_get_contents(__DIR__ . "/input.txt");
    $binaries = explode("\n", $file);

    $column_sets = [];
    foreach ($binaries as $key => $binary) {
        $set = str_split($binary);
        foreach ($set as $key => $number) {
            $column_sets[$key][] = $number;
        }
    }

    $column = 0;
    while (count($binaries) > 1) {
        $freqs = array_count_values($column_sets[$column]);
        $uncommon = ($freqs[0] <= $freqs[1] ? 0 : 1);

        foreach ($column_sets[$column] as $key => $value) {
            if ($value != $uncommon) {
                unset($binaries[$key]);
                foreach ($column_sets as $set_key => $column_list) {
                    unset($column_sets[$set_key][$key]);
                }
            }
        }
        $column++;
    }

    $binary = $binaries;

    return $binary;
}

$co2 = array_values(getCO2());
$oxygen = array_values(getOxygen());

echo (bindec($co2[0]) * bindec($oxygen[0]));
