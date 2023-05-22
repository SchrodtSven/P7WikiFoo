<?php

declare(strict_types=1);
/**
 *  
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.2
 * @since 2023-05-11
 * @deprecated since 0.2
 */


namespace SchrodtSven\P7WikiFoo\Internal\TextProcessing;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;

class TextTransformer
{
    public function camelize(string $text): string
    {
        $tmp = explode('_', $text);
        $txt = strtolower(array_shift($tmp));
        
        if(count($tmp)) {
            foreach($tmp as &$t)
            {
                $t = ucfirst(strtolower($t));
            }
        }

        $txt .= implode('', $tmp); 
        return $txt;
    }
}