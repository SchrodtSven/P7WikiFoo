<?php
/**
 * Wrapper trait for reusage of native functions getting parts of arrays
 * 
 * - slices
 * - columns
 * 
 * 
 * Providing possibility of accessing objects as arrays
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-10
 */



namespace SchrodtSven\P7WikiFoo\Internal\Type\Dry;

trait ArraySortTrait
{
    

    public function sort(int $flags = \SORT_REGULAR): self
    {
        sort($this->current, $flags);
        return $this;
    }
 

}