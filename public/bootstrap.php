<?php

declare(strict_types=1);
/**
 * Main app class - auto loading and initial setup (with public constants) 
 * for current project and starting bootstrapping
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-10
 */


require_once 'src/P7WikiFoo/App.php';

use SchrodtSven\P7WikiFoo\Entity\Foo;
use SchrodtSven\P7WikiFoo\Internal\Endpoints;

//var_dump(Endpoints::SPARQL_MAIN);

echo urlencode('Craig Noone'); // encode URI as in  <code>application/x-www-form-urlencoded</code> media type
echo PHP_EOL;
echo rawurlencode('Craig Noone'); // encode URI according to RFC 3986
echo PHP_EOL;
echo 'Craig%20Noone';
