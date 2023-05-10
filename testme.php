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
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;
use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;

$tmp = P7Array::createFromFile('archive/list_cat.txt');

$pre = 'src/P7WikiFoo/Entity/Action/Query/List/';
foreach($tmp as $item) {
    //exec($pre . $item);
    exec ('cd ' . $pre . $item . ';touch readme.md; cd -');
}

exec('tree');