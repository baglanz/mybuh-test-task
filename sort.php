<?php
function custom_sort($arr, $ascending = true) {
    if ($ascending) {
        sort($arr);
    } else {
        rsort($arr);
    }
    return $arr;
}

$array = [1, 5, 6, 2, 8, 10, 100, 14];
$sortAscending = custom_sort($array);
$sortDescending = custom_sort($array, false);

echo "По возрастанию: ";
print_r($sortAscending);
echo "По убыванию: ";
print_r($sortDescending);
