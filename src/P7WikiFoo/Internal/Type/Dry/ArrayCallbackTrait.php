<?php
/**
 * Wrapper trait for reusage of native functions applying  callbacks/closures on each element
 * 
 * - array_walk
 * - array_map
 * 
 * & some array walking/mapping custom functions
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
use SchrodtSven\P7WikiFoo\Internal\Data\NamedSymbols;

trait ArrayCallbackTrait
{
    

    /**
     * Applying callback on every element
     * 
     * @param callable $callback 
     * @return self
     */
    public function walk(callable $callback): self
    {
        array_walk($this->current, $callback);
        return $this;
    }
 
    public function trim(): self
    {
        $this->walk(function (&$item) {
            $item = $this->sanitizeP7String($item);
            $item->trim();
        });
        return $this;
    }

    public function quote(string $mark = NamedSymbols::SINGLE_QUOTES_START): self
    {
        $this->walk(function (&$item) use($mark) {
            $item = $this->sanitizeP7String($item);
            $item->quote($mark);
        });
        return $this;
    }

}