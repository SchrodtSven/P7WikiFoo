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

trait StackOperationTrait
{
    
    public function push(mixed $value): self
    {
        array_push($this->current, $value);
        return $this;
    }
   
    public function pop(): mixed
    {
        return array_pop($this->current);
    }
 
    public function unshift(mixed $value): self
    {
        array_unshift($this->current, $value);
        return $this;
    }
 
    public function shift(): mixed
    {
        return array_shift($this->current);
    }

}