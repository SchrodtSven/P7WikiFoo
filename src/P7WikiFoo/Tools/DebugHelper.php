<?php

declare(strict_types=1);
/**
 * Class representing http request(s)
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-10
 * 
 */

class DebugHelper
{
    /**
     * Stringify and return output of \var_dump($object)
     *
     * @param mixed $object
     * @return string
     */
    public static function dumpVar(mixed $object): string
    {
        \ob_start();
        \var_dump($object);
        $out = \ob_get_contents();
        \ob_end_flush();
        return $out;
    }
}