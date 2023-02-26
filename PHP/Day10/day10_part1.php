<?php

// Array of opening & closing tags
$char_legend = [
    "(" => ")",
    "<" => ">",
    "[" => "]",
    "{" => "}"
];

// Array of scores
$score_legend = [
    ")" => 3,
    "]" => 57,
    "}" => 1197,
    ">" => 25137
];

// Get input & separate by new line
$file = file_get_contents(__DIR__ . "/input.txt");
$lines = explode("\n", $file);

$score = 0;
foreach ($lines as $key => $line) {
    $sequence = "";
    $expect = [];
    $chars = str_split($line);
    foreach ($chars as $key => $char) {
        if (in_array($char, array_keys($char_legend))) {
            $sequence .= $char;
            $expect[] = $char_legend[$char];
        } elseif (end($expect) ==  $char) {
            $sequence .= $char;
            array_pop($expect);
        } else {
            echo "\n";
            var_dump("Illegal Char!");
            var_dump($sequence);
            var_dump("Expected");
            var_dump(end($expect));
            var_dump("Got");
            var_dump($char);
            echo "\n";
            $illegal[] = $char;
            $score = $score + $score_legend[$char];
            break;
        }
    }
}

echo $score;
