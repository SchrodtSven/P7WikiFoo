<?php

declare(strict_types=1);
/**
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-19
 */

use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;
use SchrodtSven\P7WikiFoo\Communication\Http\Router;
use SchrodtSven\P7WikiFoo\Internal\SingletonFactory;
use SchrodtSven\P7WikiFoo\Internal\Kernel\PhtmlParser;
use SchrodtSven\P7WikiFoo\Internal\Kernel\FrontController;

require_once 'src/P7WikiFoo/App.php';


$f = SingletonFactory::get(FrontController::class);





// $parser = new PhtmlParser();
// $parser->set('lang', 'de');
// $parser->set('title', 'Foo tpl');
// $parser->set('content', '<h1>Foo::bar</h1>');
// $f = SingletonFactory::get(Router::class);



// echo $parser->render();
// var_dump($f->getAction());
// var_dump($f->getController());   
// var_dump($f->getParams());   
// //var_dump(is_int('23'));
// var_dump(floatval('23.001'));
// var_dump(intval(intval('23')));

// var_dump(floatval('23.001') === 23.001);
// var_dump(intval(intval('23') === 23));
