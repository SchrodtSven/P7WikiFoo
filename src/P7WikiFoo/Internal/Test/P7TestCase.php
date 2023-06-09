<?php

declare(strict_types=1);
/**
 * Custom test case class inherits from PHPUnit\Framework\TestCase
 * 
 * - adding methods for dataProvider usage
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package P8
 * @version 0.1
 * @since 2023-05-05
 */


namespace SchrodtSven\P7WikiFoo\Internal\Test;
use SchrodtSven\P7WikiFoo\Internal\Data\DataSupplier;
use SchrodtSven\P7WikiFoo\Internal\SingletonFactory;
use PHPUnit\Framework\TestCase;


class P7TestCase extends TestCase
{
        public function genericProvider(string $store): array
        {
            return (SingletonFactory::get(DataSupplier::class))->getMockFromRawData($store)->raw();
        }
}