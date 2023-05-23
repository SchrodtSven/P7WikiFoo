<?php

declare(strict_types=1);
/**
 * Abstract foundation action controller
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.25
 * @since 2023-05-22
 */

namespace SchrodtSven\P7WikiFoo\Internal\Kernel;
use SchrodtSven\P7WikiFoo\Communication\Http\Router;
use SchrodtSven\P7WikiFoo\Internal\SingletonFactory;

abstract class ActionController
{
    /**
     * Router instance
     *
     * @var Router
     */
    protected Router $router;

    /**
     * For testing while developing only
     * 
     * @deprecated
     */
    public function __construct()
    {
        $this->router = SingletonFactory::get(Router::class);
        echo __CLASS__ . ' :: ';
    }

    /**
     * For testing while developing only
     * 
     * @deprecated
     */
    public function __call(string $name, array $arguments): void
    {
        echo '__call interceptor pretending to be:' . $name;
        echo ' with parameters: ';
        var_dump($arguments);
    }
}