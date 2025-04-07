<?php

function countConsecutiveDuplicates(array $arr): int
{
    $count = 0;
    $lastNumber = null;
    foreach ($arr as $number) {
        if ($number === $lastNumber) {
            $count++;
            $lastNumber = $number;
        }
    }

    return $count;
}

function generateIntArray(int $length = 100, int $min = -10, int $max = 10 ): array
{
    return array_map(fn() => rand($min, $max), range(1, $length));
}

$startTime = microtime(true);

$array = generateIntArray(); 
$pairs = countConsecutiveDuplicates($array);

$endTime = microtime(true);

echo "Количество последовательных пар одинаковых элементов: $pairs" . PHP_EOL;

$executionTime = $endTime - $startTime;
echo "Время выполнения скрипта: " . number_format($executionTime, 6) . " секунд" . PHP_EOL;

// length - 10^7, exec time - 0.627491 секунд
// length - 10^8, exec time - 6.397356 секунд

