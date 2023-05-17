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

trait ArrayPartsTrait
{
    
    /**
     * Cut elements indexed|keyed by $column
     *
     * @param string $column
     * @return self
     */
    public function cutColumn(string $column): self
    {
        return new self(array_column($this->current, $column));
    }
 
    /**
     * Cutting $length elements from <code>list</code> starting by $offset 
     *
     * @param int $offset
     * @param int|null $length
     * @return self
     */
    public function cut(int $offset, ?int $length = null): self
    {
        return new self(array_slice($this->current, $offset, $length));
    }

    /**
     * Replacing $length elements from <code>list</code> starting by $offset with
     * $replacement  
     *
     * @param int $offset
     * @param int|null $length
     * @param array $replacement
     * @return self
     */
    public function inject(int $offset, ?int $length = null, array $replacement = []): self
    {
        return new self(array_splice($this->current, $offset, $length, $replacement));
    }

    /**
     * Chunking current content into x pieces of size $length (preserving keys optionally)
     *
     * @param int $length
     * @param boolean $preserveKeys
     * @return self
     */
    public function chunk(int $length, bool $preserveKeys = false): self
    {
        return new self(array_chunk($this->current, $length, $preserveKeys ));
    }
}