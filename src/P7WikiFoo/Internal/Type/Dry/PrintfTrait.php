<?php
/**
 * Trait wrapping native *printf functions to offer OOP interface & reusage
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-11
 */

namespace SchrodtSven\P7WikiFoo\Internal\Type\Dry;
use SchrodtSven\P7WikiFoo\Internal\Data\NamedSymbols;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;

trait PrintfTrait
{
    protected function sprintfAppend(string|P7String $string): void
    {
        $this->sprintfReplace($this->current, $string);
    }

    protected function sprintfPrepend(string|P7String $string): void
    {
        $this->sprintfReplace($string, $this->current);
    }

    protected function vsprintfReplace(string|P7String $format, array $args): void
    {
        $this->current = vsprintf($format, $args);
    }

    protected function sprintfReplace(string|P7String $string, string $plus = ''): void
    {
        $this->current = sprintf('%s%s', $string, $plus);
    }
}