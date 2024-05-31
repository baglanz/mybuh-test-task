<?php

include('simple_html_dom.php');

function parser() {
    $url = 'https://www.opennet.ru/';

    $html = file_get_html($url);

    $news = [];

    foreach($html->find('td > a') as $item) {
        if(strpos($item->href, '/opennews/art.shtml?num=') !== false) {
            $title = $item->plaintext;

            $link = $url . $item->href;

            $news[] = [
                'title' => $title,
                'url' => $link,
            ];
        }
    }

    return $news;
}

$news = parser();
var_dump($news);
