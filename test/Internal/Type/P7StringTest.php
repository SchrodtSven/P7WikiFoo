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
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;
use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;

class P7StringTest extends P7TestCase
{
    /**
     * @dataProvider basicProvider
     *
     * @param string $first
     * @param string $last
     * @param string $both
     * @param string $mail
     * @param string $start
     * @param string $end
     * @param string $embraced
     * @return void
     */
    public function testAppendingPrepending(
        string $first, 
        string $last,
        string $both, 
        string $mail,
        string $start, 
        string $end,
        string $embraced): void
    {
        $this->assertSame($first . ' ' . $last, (string) (new P7String($first))->append(' ')->append($last));
        $this->assertSame($both, (string) (new P7String($first))->append(' ')->append($last));
        $this->assertSame($embraced, (string) (new P7String($last))->embrace($start));
        $this->assertSame($start . $last . $end, (string) (new P7String($last))->embrace($start));
    }


    /**
     * Testing transformation snake_case -> camelCase
     *
     * @dataProvider  snakyToCamelProvider
     * 
     * @param string $snake
     * @param string $camel
     * @param string $separator
     * @return void
     */
    public function testSnakyCamelizing(string $snake, string $camel, string $separator): void
    {
        $this->assertSame($camel,  (string) (new P7String($snake))->camelize($separator));
    }


    /**
     * Testing transformation  camelCase -> snake_case
     *
     * @dataProvider  snakyToCamelProvider
     * 
     * @param string $snake
     * @param string $camel
     * @param string $separator
     * @return void
     */
    public function testCamelikeSnakifying(string $snake, string $camel, string $separator): void
    {
        $this->assertSame($snake,  (string) (new P7String($camel))->snakify(true, $separator));
    }

    public function basicProvider(): array
    {
        return $this->genericProvider('namesMails');
    }

    public function snakyToCamelProvider(): array
    {
        return $this->genericProvider('snake2Camel');
    }
}