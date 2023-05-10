<?php

declare(strict_types=1);
/**
 * Class generating endpoints for usage with Wiki* projects  
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-10
 */


namespace SchrodtSven\P7WikiFoo\Internal;


class EndpointBuilder
{
    protected string $host = 'http://en.wikipedia.org';

    protected string $pathPrefix = '/w/api.php';
}