<?php

declare(strict_types=1);
/**
 * Class managing HTTP routing:
 *   uri (http|https://foo/bar/..)  => $SUB\NAMESPACE\$Class::method(...parameters)
 * 
 * 
 * 
 * 
 * @todo Extend routing to work in sub directories of $DOCUMENT_ROOT!!!
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.23
 * @since 2023-05-18
 * 
 */

namespace SchrodtSven\P7WikiFoo\Communication\Http;
use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;
use SchrodtSven\P7WikiFoo\Communication\Http\Request;

class Router
{
    public function __construct(private Request $request, private string $relUri = '')
    {
        
    }   

}