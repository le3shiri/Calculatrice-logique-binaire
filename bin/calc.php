#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Converter;
use App\Calculator;

$options = getopt('', ['json']);
$isJson = isset($options['json']);

$args = array_slice($argv, 1);
$nonOptionArgs = array_filter($args, function ($arg) {
    return strpos($arg, '--') !== 0;
});

if (count($nonOptionArgs) !== 2) {
    if ($isJson) {
        echo json_encode(['error' => 'Usage: php bin/calc.php <A> <B> [--json]']);
    } else {
        echo "Usage: php bin/calc.php <A> <B> [--json]\n";
    }
    exit(1);
}

$a_str = $nonOptionArgs[0];
$b_str = $nonOptionArgs[1];

if (!ctype_digit($a_str) || !ctype_digit($b_str)) {
    if ($isJson) {
        echo json_encode(['error' => 'Inputs must be positive integers.']);
    } else {
        echo "Inputs must be positive integers.\n";
    }
    exit(1);
}

$a = (int)$a_str;
$b = (int)$b_str;

$max_bits = max(strlen(decbin($a)), strlen(decbin($b)));

$calc = new Calculator($a, $b);

$and = $calc->and();
$or = $calc->or();
$xor = $calc->xor();
$not = $calc->notA();

if ($isJson) {
    $data = [
        'entree_a' => [
            'decimal' => $a,
            'binaire' => Converter::toBinary($a, $max_bits)
        ],
        'entree_b' => [
            'decimal' => $b,
            'binaire' => Converter::toBinary($b, $max_bits)
        ],
        'a_et_b' => [
            'decimal' => $and,
            'binaire' => Converter::toBinary($and, $max_bits)
        ],
        'a_ou_b' => [
            'decimal' => $or,
            'binaire' => Converter::toBinary($or, $max_bits)
        ],
        'a_xor_b' => [
            'decimal' => $xor,
            'binaire' => Converter::toBinary($xor, $max_bits)
        ],
        'non_a' => [
            'decimal' => $not,
            'binaire' => Converter::toBinary($not)
        ]
    ];
    echo json_encode($data, JSON_PRETTY_PRINT);
    exit(0);
}

echo "Entree A : {$a} (" . Converter::toBinary($a, $max_bits) . ")\n";
echo "Entree B : {$b} (" . Converter::toBinary($b, $max_bits) . ")\n";
echo "A ET B : {$and} (" . Converter::toBinary($and, $max_bits) . ")\n";
echo "A OU B : {$or} (" . Converter::toBinary($or, $max_bits) . ")\n";
echo "A XOR B : {$xor} (" . Converter::toBinary($xor, $max_bits) . ")\n";
echo "NON A : {$not} (" . Converter::toBinary($not) . ")\n";