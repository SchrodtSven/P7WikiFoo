<?php

declare(strict_types=1);
/**
 * Trait for string transformation
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-16
 */

namespace SchrodtSven\P7WikiFoo\Internal\Type\Dry;

use SchrodtSven\P7WikiFoo\Internal\Data\NamedSymbols;
use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;

trait StringTransformingTrait
{   
    /**
     * Splitting string at UpperCasedSubstrings
     *
     * @param string $string
     * @return P7Array
     */
    public function splitOnUpperCaseSubstring(): P7Array
    {
        return new P7Array(preg_split('/(?=[A-Z])/', $this->current, - 1, \PREG_SPLIT_NO_EMPTY));
    }

    /**
     * Transforming string separated by $separator into camelCasedString
     *
     * @param string $text
     * @param string $separator
     * @return self
     */
    public function camelize(string $separator = NamedSymbols::UNDERSCORE, bool $lowerFirst = true): self
    {
        $this->save();
        $tmp = $this->splitBy($separator);
     
        $first = (new P7String($tmp->shift()))->lower();

        $tmp->walk(function(&$item) {
            $item = (new P7String($item))->lower()->upperFirst();
        });
     
        return ($lowerFirst) 
                    ? $first->append($tmp->join(''))
                    : $first->append($tmp->join(''))->upperFirst();
    }
     
    /**
     * Transforming camelCasedString to snake_cased_string
     *
     * @param string $string
     * @param boolean $lowercase
     * @return void
     */
    public function snakify(bool $lowercase= true, string $glue = NamedSymbols::UNDERSCORE): self
    {
        return ($this->splitOnUpperCaseSubstring($this->current))->join($glue)->lower();
    }

    /**
     * Transforming first character to upper first
     *
     * @return self
     */
    public function upperFirst(): self
    {
        $this->save();
        $this->current = ucfirst($this->current);
        return $this;
    }

    /**
     * Transforming first character to upper first
     *
     * @return self
     */
    public function lowerFirst(): self
    {
        $this->save();
        $this->current = lcfirst($this->current);
        return $this;
    }

}