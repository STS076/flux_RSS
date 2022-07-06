<?php
$fluxRSS = [
    'https://rmcsport.bfmtv.com/rss/cyclisme/tour-de-france/',
    'https://rmcsport.bfmtv.com/rss/jeux-olympiques/',
    'https://rmcsport.bfmtv.com/rss/sports-extremes/',
    'https://rmcsport.bfmtv.com/rss/voile/',
    'https://rmcsport.bfmtv.com/rss/sports-d-hiver/'
];
setlocale(LC_TIME, "fr_FR", "fra");
$date_format = '%A %d %B %Y';
function recupXML($url)
{
    if (!@$rss = simplexml_load_file($url)) {
        throw new Exception('Flux introuvable');
    } else {
        return $rss;
    }
}
$array = [];
foreach ($fluxRSS as $value) {
    try {
        $rss = recupXML($value);
        array_push($array, $rss->channel->item);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


