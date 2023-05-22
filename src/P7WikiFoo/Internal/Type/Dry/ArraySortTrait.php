<?php
/**
 * Wrapper for reusage of native sorting functions offering OOP interface
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
    

    /**
     * Generic sorting function
     *
     * @param [type] $flags
     * @return self
     */
    public function sort(int $flags = \SORT_REGULAR): self
    {
        sort($this->current, $flags);
        return $this;
    }

    /**
     * Generic multi array sorting function
     *
     * @param mixed $sortOrder
     * @param [type] $sortFlags
     * @param mixed ...$rest
     * @return boolean
     */
    public function multiSort(mixed $sortOrder = \SORT_ASC, $sortFlags = \SORT_REGULAR, mixed ...$rest): bool
    {
        return array_multisort($this->current, $sortOrder, $sortFlags, ...$rest);
    }
 

}