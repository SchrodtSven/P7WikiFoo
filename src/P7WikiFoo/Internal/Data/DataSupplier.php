<?php

declare(strict_types=1);
/**
 * Supplying (random) mock data for tests etc.
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
use SchrodtSven\P7WikiFoo\Internal\File\FileError;
use SchrodtSven\P7WikiFoo\Internal\SingletonFactory;
 

class DataSupplier
{
    private static ?P7Array $firstNames = null;

    private static ?P7Array $lastNames = null;

    public function getMockFromRawData(string $store): P7Array
    {
        $file = App::MOCK_RAW_DIR . $store  .'.php';
        if(!file_exists($file))
            throw new FileError($store, 404);
        return new P7Array(require $file);
    }    

     public function getRandomItemFromStore(string $store): P7String
     {
        $tmp = $this->getMockFromRawData($store);
        return new P7String($tmp[$tmp->rand(1)[0]]);
     }  
}