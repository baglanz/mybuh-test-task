<?php

$url = 'https://www.opennet.ru';

$contents = file_get_contents($url);

$html = mb_convert_encoding($contents, 'UTF-8', "koi8-r");

$dom = new DOMDocument();

@$dom->loadHTML('<?xml encoding="UTF-8">' . $html);

$xpath = new DOMXpath($dom);

$elements = $xpath->query("//div[@class='hdr_main']//table//td[@class='tnews']//a");

$news = [];
foreach ($elements as $element) {
    $news[] = [
        'title' => trim($element->nodeValue),
        'url' => $url . $element->getAttribute('href'),
    ];
}

print_r($news);