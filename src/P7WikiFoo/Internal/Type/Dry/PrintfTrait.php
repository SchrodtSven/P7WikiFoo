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

trait PrintfTrait
{
    protected function sprintfAppend(string $string): void
    {
        $this->sprintfReplace($this->current, $string);
    }

    protected function sprintfPrepend(string $string): void
    {
        $this->sprintfReplace($string, $this->current);
    }

    protected function vsprintfReplace(string $format, array $args): void
    {
        $this->current = vsprintf($format, $args);
    }

    protected function sprintfReplace(string $string, string $plus = ''): void
    {
        $this->current = sprintf('%s%s', $string, $plus);
    }
}