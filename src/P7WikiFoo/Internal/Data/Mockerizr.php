<?php

declare(strict_types=1);
/**
 * Class creating (randomized) mock data - examples:
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
use \Random\Randomizer;
use SchrodtSven\P7WikiFoo\Internal\SingletonFactory;

class Mockerizr
{
   private Randomizer $randomizr;

   private SingletonFactory $factory;

   private DataSupplier $supplier;

   public function __construct()
   {
        
        $this->factory = new SingletonFactory;
        $this->supplier = new DataSupplier;
   }

    /**
     * Domain names for testing, insuring invalidity and documentation  - acc. to RFC 2606
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
        return (new P7Array(require 'data/Mock/Metasyntactix.php'))->shuffle();
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
        $keys = array_keys(self::DOMAINS);
        $randomizr = $this->factory::get(Randomizer::class);
        
        $rnd = $randomizr->getInt(1, 18);
        $idx = ($rnd > 15) ? 1 : 0;
        $subKey = $randomizr->pickArrayKeys(self::DOMAINS[$keys[$idx]], 1);
       
        $domain = self::DOMAINS[$keys[$idx]][$subKey[0]];
        if(strpos($domain, '.') === 0) {
            $domain = $this->getMetasyntactix()[0] . $domain;
        }

        return new P7String($domain);
    }

    public function getRandomEmailAddr(): P7String
    {
        return (new P7Array([
            $this->getRandomEmailPrefix(
                $this->supplier->getRandomItemFromStore('firstNames'),
                $this->supplier->getRandomItemFromStore('lastNames')
            ),
            '@',
            $this->getRandomSld()
            ]))->join('')->lower();
    }

    public function getRandomEmailAddrByNames(string|P7String $first, string|P7String $last): P7String
    {
        return (new P7Array([
            $this->getRandomEmailPrefix($first, $last),
            '@',
            $this->getRandomSld()
            ]))->join('')->lower();
    }

    public function getRandomEmailPrefix(P7String $first, P7String $last): string
    {
       
        $randomizr = $this->factory::get(Randomizer::class);
        $number = $randomizr->getInt(1,6);
        $yob = $randomizr->getInt(1904, 2023);
        /**
         * sven_schrodt@
         * svenschrodt@a
         * schrodt.sven
         * sven1970@
         *  // s.schrodt@a
         * */ 
        
        return match($number) {
            1 => $first . '.' . $last,
            2 => $first . '_' . $last,
            3 => $first . $last,
            4 => $last . '.' . $first,
            5 => $first->substr(0, 1)  . '.' . $last,
            6 => $first . $yob
        };
         
    }

    public function getRandomEnclosingMark():
    {
        
    }
}