<?php

$file = file_get_contents(__DIR__ . "/input.txt");
$lines = explode("\n", $file);

$lines = array_map(function($line){
    $rule = explode('->', $line);
    $x = explode(',', $rule[0]);
    $y = explode(',', $rule[1]);
    $x['x1', 'x2'] = [$x];
var_dump($rule);

}, $lines);


