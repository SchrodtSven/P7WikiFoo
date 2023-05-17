<?php
/**
 * Handling given value(s) for context(s)
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-17
 */

namespace SchrodtSven\P7WikiFoo\Internal\Type\Dry;
use SchrodtSven\P7WikiFoo\Internal\Data\NamedSymbols;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;
use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\Data\CodeBuilder;

trait ValueTrait
{
    /**
     * Creating literal from $value for assignment
     */
    public function literalize(mixed $value): mixed
    {
        return match(true) {
            (is_string($value)) => (new P7String($value))->quote(),
            ($value instanceof P7String) => $value->quote(),
            (is_numeric($value)) => $value,
            (is_bool($value)) => (true) ? (new P7String('true')) : (new P7String('false')),
            (is_null($value)) => (new P7String('null'))
           // @FIXME (is_array($value)) => (new P7Array())->
        };
    }

}