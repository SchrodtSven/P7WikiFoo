<?php

declare(strict_types=1);
/**
 * Class creating mock data - examples:
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-15
 */
namespace SchrodtSven\P7WikiFoo\Internal\Data;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;
use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\Data\MockTpl;

class Mockerizr
{
    private static ?P7Array $metasyntactix = null;
    /**
     * Domain names for testing, insuring  invalidity and documentation  - acc. to RFC 2606
     * 
     * @link https://www.rfc-editor.org/rfc/rfc2606.html  
     */ 
    public const  DOMAINS = [
                              'TLD' => ['.test',
                                        '.example',
                                        '.invalid'],

                              'SLD' => ['example.com',
                                        'example.net',
                                        'example.org']
    ];   


    public function getMetasyntactix(): P7Array
    {
        if(is_null(self::$metasyntactix)) {
            self::$metasyntactix = new P7Array(require 'data/Mock/Metasyntactix.php');
        }
        return self::$metasyntactix;
    }

    public function getRandomMetasyntactic(int $num = 1): P7Array
    {
        $meta = $this->getMetasyntactix();
        $tmp = new P7Array();
        for($i=0;$i<$num;$i++) {
            $tmp->push($meta[$meta->rand(1)[0]]);
        }
        return $tmp;
    }

    public function getRandomSld(): P7String
    {
        $idx = array_rand(array_keys(self::DOMAINS));


        return new P7String();
    }
}