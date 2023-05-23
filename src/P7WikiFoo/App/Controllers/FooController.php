<?php

declare(strict_types=1);
/**
 * Foo controller
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.25
 * @since 2023-05-22
 */

namespace SchrodtSven\P7WikiFoo\App\Controllers;
use SchrodtSven\P7WikiFoo\Internal\Kernel\ActionController;

class FooController extends ActionController
{
    public function __construct()
    {
        echo __CLASS__ . ' :: ';
    }
    public function fooAction(): void
    {
        echo 'foo';
    }

    public function barAction(): void
    {
        echo 'bar';
    }

     
}