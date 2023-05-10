<?php
/**
 * Trait for classes implementing interface \ArrayAccess
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

trait IteratorTrait
{
    // The following functions implement interface \Iterator making it possible
    // to iterate container objects with foreach

    /**
     * Resetting pointer to first array element
     */
    public function rewind(): void
    {
        reset($this->current);
    }

    /**
     * Getting current element
     *
     */
    public function current(): mixed
    {
        return current($this->current);
    }

    /**
     * Getting key of current element
     * 
     * @return mixed
     */
    public function key(): mixed
    {
        return key($this->current);
    }

    /**
     * Forward internal array pointer
     * 
     * @return mixed|void
     */
    public function next(): void
    {
        next($this->current);
    }

    /**
     * Returning if current element is valid
     *
     * @return bool
     */
    public function valid(): bool
    {
        return ($this->current() !== false);
    }

}