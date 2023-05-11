<?php

declare(strict_types=1);
/**
 * Unit testing FOO bla
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-11
 */

use SchrodtSven\P7WikiFoo\Internal\Test\P7TestCase;
use SchrodtSven\P7WikiFoo\Entity\Action\Query;

class QueryTest extends P7TestCase
{
    public function testFoo()
    {
        $this->assertTrue(is_string('FooBar'));
    }
}