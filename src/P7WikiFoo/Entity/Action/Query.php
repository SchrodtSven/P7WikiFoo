<?php

declare(strict_types=1);
/**
 * Entity class for Wikimedia main modules "action" of type  "query"
 * 
 * prop - get properties of page  
 * list - get list of pages matching a certain criterion
 * meta - get meta information about the wiki and user
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-10
 */


namespace SchrodtSven\P7WikiFoo;
namespace SchrodtSven\P7WikiFoo\Entity\Action;

class Query
{
    public function __construct()
    {
        echo 'I am : ' . __CLASS__;
    }
}