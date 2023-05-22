<?php

namespace SchrodtSven\P7WikiFoo\App\Controllers;

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