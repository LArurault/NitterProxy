<?php
$INSTANCES = [
    "https://nitter.42l.fr/",
    "https://nitter.nixnet.services/",
    "https://nitter.tedomum.net/",
    "https://nitter.fdn.fr/",
    "https://nitter.net/",
];

if (!isset($_GET["username"])) {
    http_response_code(400);
    return;
}

$i = 0;
$content = null;
while (!$content and count($INSTANCES) > $i) {
    $url = $INSTANCES[$i] . $_GET["username"] . "/rss";
    $content = file_get_contents($url);
    $i++;
}

if (!$content) {
    http_response_code(404);
    return;
}

// remove instance names in GUIDS to avoid duplication
$xml = new SimpleXMLElement($content);
foreach ($xml->xpath("channel/item") as $item) {
    $item->guid = explode("/", $item->guid)[5];
    if (isset($_GET['nort']) && str_starts_with($item->title, 'RT')) {
        unset($item[0]);
    }
}

header("Content-type: text/xml; charset=utf-8");
print($xml->asXML());
