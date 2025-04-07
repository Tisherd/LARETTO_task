<?php

function countConsecutiveDuplicates(array $arr): int
{
    $count = 0;
    $lastNumber = null;
    foreach ($arr as $number) {
        if ($number == $lastNumber) {
            $count++;
        }
        $lastNumber = $number;
    }

    return $count;
}

function generateIntArray(int $length = 100, int $min = -10, int $max = 10 ): array
{
    // Использование array_map с range/array_fill снижает производительность
    $array = [];
    for ($i = 0; $i < $length; $i++) {
        $array[] = rand($min, $max);
    }
    return $array;
}

$array = generateIntArray();
$pairsCount = countConsecutiveDuplicates($array);

echo "Количество последовательных пар одинаковых элементов: $pairsCount" . PHP_EOL;

/* 
    length - 10^7
    generateIntArray time               0.332157 секунд
    countConsecutiveDuplicates time     0.062084 секунд
    ---------------------------------------------------
    length - 10^8
    generateIntArray time               3.682004 секунд
    countConsecutiveDuplicates time     0.657786 секунд
*/
