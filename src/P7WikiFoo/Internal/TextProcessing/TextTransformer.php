<?php

declare(strict_types=1);
/**
 * Very basic template parser replacing placeholders ({{PLACE_HOLDER_NAME}} by default)  
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-11
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