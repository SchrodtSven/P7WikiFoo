<?php

declare(strict_types=1);
/**
 * Public constants for named symbols
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-05
 */


namespace SchrodtSven\P7WikiFoo\Internal\Data;

class NamedSymbols
{
    public const CHEVRONS_START = '<';  // open chevrons
    public const CHEVRONS_END   = '>';  // close chevrons
    public const PARENTHESES_START = '(';  // open parentheses
    public const PARENTHESES_END   = ')';  // close parentheses
    public const BRACES_START = '{';  // open braces
    public const BRACES_END   = '}';  // close braces
    public const BRACKETS_START = '[';  // open brackets
    public const BRACKETS_END   = ']';  // close brackets
    public const PIPE_START = '|';  // open pipe
    public const PIPE_END   = '|';  // close pipe
    public const TICK_START = '´';  // open tick
    public const TICK_END   = '´';  // close tick
    public const BACKTICK_START = '`';  // open backtick
    public const BACKTICK_END   = '`';  // close backtick
    public const SINGLE_QUOTES_START = '\'';  // open single quotes
    public const SINGLE_QUOTES_END   = '\'';  // close single quotes
    public const DOUBLE_QUOTES_START = '"';  // open double quotes
    public const DOUBLE_QUOTES_END   = '"';  // close double quotes
    public const TYPOGRAPHIC_SINGLE_QUOTES_START = '‘';  // open typographic single quotes
    public const TYPOGRAPHIC_SINGLE_QUOTES_END   = '’';  // close typographic single quotes
    public const TYPOGRAPHIC_DOUBLE_QUOTES_START = '“';  // open typographic double quotes
    public const TYPOGRAPHIC_DOUBLE_QUOTES_END   = '”';  // close typographic double quotes

     // Card Suits
     public const  BLACK_SPADE_SUIT = '♠';

     public const  BLACK_HEART_SUIT = '♥';
     
     public const  BLACK_DIAMOND_SUIT = '♦';
 
     public const  BLACK_CLUB_SUIT = '♣';

     /**
     * Constant name for underscore (aliases: underline, underdash, low line or low dash)
     * 
     * @var string
     */
    public const UNDERSCORE = "_";
    
    
    public const HYPHEN = "-";
}