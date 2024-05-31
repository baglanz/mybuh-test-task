<?php

function bubbleSort($arr, $ascending = true) {
    $n = count($arr);
    if ($n <= 1) {
        return $arr;
    }

    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($ascending) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            } else {
                if ($arr[$j] < $arr[$j + 1]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }
        }
    }

    return $arr;
}

$array = [1, 5, 6, 2, 8, 10, 100, 14];
$sortAscending = bubbleSort($array);
$sortDescending = bubbleSort($array, false);

echo "По возрастанию: ";
print_r($sortAscending);

echo "По убыванию: ";
print_r($sortDescending);
