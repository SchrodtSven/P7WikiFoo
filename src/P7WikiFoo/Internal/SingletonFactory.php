<?php

declare(strict_types=1);
/**
 * Factory class for singleton instances of 
 * 
 *  - native PHP classes
 *  - custom project specific classes 
 * 
 * Key in container is fqcn (fully qualified class name) of singleton instances
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-16
 */

namespace SchrodtSven\P7WikiFoo\Internal;

use SchrodtSven\P7WikiFoo\Internal\Kernel\PhtmlParser;

class SingletonFactory
{
    
    /**
     * Container array holding fqcn as keys and ?instances
     *
     * @var array
     */
    public static array $container = [
        \Random\Randomizer::class => null,
        \SchrodtSven\P7WikiFoo\Internal\Data\DataSupplier::class => null,
        \SchrodtSven\P7WikiFoo\Internal\Data\Mockerizr::class => null,
        \SchrodtSven\P7WikiFoo\Communication\Http\Request::class => null,
        \SchrodtSven\P7WikiFoo\Communication\Http\Response::class => null,
        \SchrodtSven\P7WikiFoo\Communication\Http\Router::class => null,
        \SchrodtSven\P7WikiFoo\Internal\Kernel\FrontController::class => null,
        \SchrodtSven\P7WikiFoo\Internal\TextProcessing\BeggarmanParser::class => null,
        \SchrodtSven\P7WikiFoo\Internal\Kernel\PhtmlParser::class => null,
        \SchrodtSven\P7WikiFoo\Internal\Kernel\SessionManager::class => null,



    ];

    /**
     * Getter for singleton instances
     *
     * @param string $containerKey
     * @return mixed
     */
    public static function get(string $containerKey):mixed
    {
        if(is_null((self::$container[$containerKey]))) 
            self::$container[$containerKey] = new $containerKey;

        return self::$container[$containerKey];
    }

    /**
     * Checking if key in factory container exists
     *
     * @param string $name
     * @return boolean
     */
    public static function has(string $name): bool
    {
        return isset(self::$container[$name]);
    }
}