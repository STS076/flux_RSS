<?php

$fluxRSS = [
    'bike' => 'https://rmcsport.bfmtv.com/rss/cyclisme/tour-de-france/',
    'olympics' => 'https://rmcsport.bfmtv.com/rss/jeux-olympiques/',
    'extreme' => 'https://rmcsport.bfmtv.com/rss/sports-extremes/',
    'sail' => 'https://rmcsport.bfmtv.com/rss/voile/',
    'winter' => 'https://rmcsport.bfmtv.com/rss/sports-d-hiver/'
];

setlocale(LC_TIME, "fr_FR", "fra");
$date_format = '%A %d %B %Y';

function recupXML($url)
{
    if (!@$rss = simplexml_load_file($url)) {
        throw new Exception('Flux introuvable');
    } else {
        return $rss->channel->item;
    }
}
if (isset($_GET['sport'])) {
    $flux = recupXML($fluxRSS[$_GET['sport']]);
} 