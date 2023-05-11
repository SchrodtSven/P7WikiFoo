<?php

declare(strict_types=1);
/**
 * OOP access to string operations
 * 
 * - rollback (depth 1 - otherwise use <code>clone</code>)
 * - using multi byte function internally
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-10
 */


namespace SchrodtSven\P7WikiFoo\Internal\Type;
use SchrodtSven\P7WikiFoo\Internal\Type\Dry\MultiByteStringTrait;
use SchrodtSven\P7WikiFoo\Internal\Type\Dry\StringEmbracingTrait;

class P7String implements \Stringable
{
    use MultiByteStringTrait;
    use StringEmbracingTrait;

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

    public function splitBy(string $separator): P7Array
    {
        return new P7Array(explode($separator, $this->current));
    }

    public function replace(string|array $find, string|array $replace): self
    {
        $this->save();
        $this->current = str_replace($find, $replace, $this->current);
        return $this;
    }

    public function embrace(string $start): self
    {
        $this->save();
        $this->current = $this->enclose($this->current, $start);
        return $this;
    }

    public function __toString(): string
    {
        return $this->current;
    }

    /**
     * Explicit alias for __toString for future usage in interfaces
     *
     * @return string
     */
    public function raw(): string
    {
        return $this->current;
    }
}