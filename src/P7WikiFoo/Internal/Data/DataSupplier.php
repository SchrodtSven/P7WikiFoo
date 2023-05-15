<?php

declare(strict_types=1);
/**
 * Getting array of metasyntacic variable names
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-15
 */

namespace SchrodtSven\P7WikiFoo\Internal\Data;
use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;
use SchrodtSven\P7WikiFoo\App;

class DataSupplier
{
    private static ?P7Array $firstNames = null;

    private static ?P7Array $lastNames = null;

    public function getMockFromRawData(string $store)
    {
        return new P7Array(require App::MOCK_RAW_DIR . $store  .'.php');
    }    
}