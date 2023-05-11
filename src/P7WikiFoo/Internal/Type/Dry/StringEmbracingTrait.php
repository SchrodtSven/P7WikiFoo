<?php
/**
 * Trait for embracing strings 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-11
 */

namespace SchrodtSven\P7WikiFoo\Internal\Type\Dry;
use SchrodtSven\P7WikiFoo\Internal\Data\NamedSymbols;

trait StringEmbracingTrait
{
    /**
     * Matching given start sign to end - example:
     * '<' => '>'
     * 
     * @param string $start
     * @return string
     */
    public function locateEnd(string $start): string
    {
        return match($start) {
                                NamedSymbols::CHEVRONS_START => NamedSymbols::CHEVRONS_END,  // chevrons
                                NamedSymbols::PARENTHESES_START => NamedSymbols::PARENTHESES_END,  // parentheses
                                NamedSymbols::BRACES_START => NamedSymbols::BRACES_END,  // braces
                                NamedSymbols::BRACKETS_START => NamedSymbols::BRACKETS_END,  // brackets
                                NamedSymbols::PIPE_START => NamedSymbols::PIPE_END,  // pipe
                                NamedSymbols::TICK_START => NamedSymbols::TICK_END,  // tick
                                NamedSymbols::BACKTICK_START => NamedSymbols::BACKTICK_END,  // backtick
                                NamedSymbols::SINGLE_QUOTES_START => NamedSymbols::SINGLE_QUOTES_END,  // single quotes
                                NamedSymbols::DOUBLE_QUOTES_START => NamedSymbols::DOUBLE_QUOTES_END,  // double quotes
                                NamedSymbols::TYPOGRAPHIC_SINGLE_QUOTES_START => NamedSymbols::TYPOGRAPHIC_SINGLE_QUOTES_END,  // typographic single quotes
                                NamedSymbols::TYPOGRAPHIC_DOUBLE_QUOTES_START => NamedSymbols::TYPOGRAPHIC_DOUBLE_QUOTES_END,  // typographic double quotes            
                                default => $start // any other character will be used by itself as $end
        };
    }

    /**
     * Embracing $string with $start and matched close sign
     *
     * @param string $string
     * @param string $start
     * @return string
     */
    public function enclose(string $string, string $start): string
    {
        return (sprintf('%s%s%s', $start, $string, $this->locateEnd($start)));
    }
   
    
}