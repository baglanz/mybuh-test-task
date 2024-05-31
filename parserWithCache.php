<?php

$url = 'https://www.opennet.ru';

$contents = file_get_contents($url);

$html = mb_convert_encoding($contents, 'UTF-8', "koi8-r");

$dom = new DOMDocument();

@$dom->loadHTML('<?xml encoding="UTF-8">' . $html);

$xpath = new DOMXpath($dom);

$elements = $xpath->query("//div[@class='hdr_main']//table//td[@class='tnews']//a");

$cacheJson = @file_get_contents('cache.txt');
$cache = json_decode($cacheJson, true) ?? [];

foreach ($elements as $element) {
    $link = $url . $element->getAttribute('href');

    if (array_key_exists($link, $cache)) {
        continue;
    }

    $cache[$link] = trim($element->nodeValue);
}

file_put_contents('cache.txt', json_encode($cache));
