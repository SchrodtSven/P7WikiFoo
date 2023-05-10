<?php

$query = ' https://query.wikidata.org/sparql?query=SELECT%20?dob%20WHERE%20{wd:Q42%20wdt:P569%20?dob.}';
echo urldecode($query);
// https://www.wikidata.org/w/index.php
echo PHP_EOL.PHP_EOL;
$newQuery = 'search=Adolf Hitler&title=Special:Search&profile=advanced&fulltext=1&ns0=1&ns120=1';
echo urlencode($newQuery);
echo PHP_EOL.PHP_EOL;
parse_str($newQuery, $dta);
var_dump($dta);


$search = 'https://www.wikidata.org/w/api.php?action=query&list=search&srsearch=#Wolverine&format=json';