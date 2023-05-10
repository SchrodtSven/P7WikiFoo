<?php

declare(strict_types=1);
/**
 * OOP access to string operations
 * 
 * - rollback
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-10
 */


namespace SchrodtSven\P7WikiFoo\Internal\Type;

class P7String implements \Stringable
{
    
    public function __construct(protected string $current = '', protected string $previous = '')
    {

    }

    protected function save(): self
    {
        $this->previous = $this->current;
        return $this;
    }


    protected function rollBack(): self
    {
        $this->current = $this->previous;
        return $this;
    }

    public function __toString(): string
    {
        return $this->current;
    }

    /**
     * Explicit alias for __toString 
     *
     * @return string
     */
    public function raw(): string
    {
        return $this->current;
    }
}