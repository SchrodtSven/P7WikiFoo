<?php

declare(strict_types=1);
/**
 * OOP access to array operations
 * 
 * - rollback (only 1 level - cloning instance is possible)
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-10
 */


namespace SchrodtSven\P7WikiFoo\Internal\Type;
use SchrodtSven\P7WikiFoo\Internal\Type\Dry\ArrayAccessTrait;
use SchrodtSven\P7WikiFoo\Internal\Type\Dry\IteratorTrait;
use SchrodtSven\P7WikiFoo\Internal\Type\Dry\StackOperationTrait;

class P7Array implements \ArrayAccess, \Iterator, \Countable, StackInterface
{
    
    use IteratorTrait;
    use ArrayAccessTrait;
    use StackOperationTrait;

    public function __construct(protected array $current = [], protected array $previous = [])
    {

    }

    public static function createFromFile(string $filename, bool $autoTrim = true): self
    {
        if(!\file_exists($filename)) {
            throw new \Error('File not found!');
        }
        $tmp = new self(file($filename));
        if($autoTrim) {
            $tmp->walk(function(&$item) {
                $item = trim($item);
            });
        }
        return $tmp;
    }

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

    public function count(): int
    {
        return count($this->current());
    }

    public function raw(): string
    {
        return $this->current;
    }
}