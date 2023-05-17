<?php
/**
 * Wrapper trait for reusage of native functions getting parts of arrays
 * 
 * - auto filling with values
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

trait ArrayContentsTrait
{
    
 
    public function setDefault(int $startIndex, int $count, mixed $value): self
    {
        return new self(array_fill($startIndex, $count, $value));
    }

    public static function range(string|int|float $start, string|int|float $end, int|float $step = 1): self
    {
        return new self($start, $end, $step);
    }

    public function intersect(array ...$arrays): self
    {
        return new self(array_intersect($this->current, $arrays));
    }

    public function combineWithValues(array $values): self
    {
        return new self(array_combine($this->current, $values));
    }
     
    public function combineWithKeys(array $keys): self
    {
        return new self(array_combine($keys, $this->current));
    }

    public function flip(): self
    {
        return new self(array_flip($this->current));
    }
     
    public function keys(): self
    {
        return new self(array_keys($this->current));
    }

    public function values(): self
    {
        return new self(array_values($this->current));
    }

    public function merge(array ...$arrays): self
    {
        return new self(array_merge($this->current, $arrays));
    }
}