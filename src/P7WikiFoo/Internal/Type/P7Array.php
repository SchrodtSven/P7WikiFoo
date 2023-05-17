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
use SchrodtSven\P7WikiFoo\Internal\Type\Dry\ArrayCallbackTrait;
use SchrodtSven\P7WikiFoo\Internal\Type\Dry\ArrayPartsTrait;
use SchrodtSven\P7WikiFoo\Internal\Type\Dry\IteratorTrait;
use SchrodtSven\P7WikiFoo\Internal\Type\Dry\StackOperationTrait;
use SchrodtSven\P7WikiFoo\Internal\Type\Dry\TypeConverterTrait;
use SchrodtSven\P7WikiFoo\Internal\Type\Dry\ArraySortTrait;
use SchrodtSven\P7WikiFoo\Internal\SingletonFactory; 
use Random\Randomizer;

class P7Array implements \ArrayAccess, \Iterator, \Countable, StackInterface
{
    
    use IteratorTrait;
    use ArrayAccessTrait;
    use StackOperationTrait;
    use ArrayPartsTrait;
    use ArrayCallbackTrait;
    use TypeConverterTrait;
    use ArraySortTrait;

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

    public static function createFromJsonFile(string $filename, bool $asArray = true): self
    {
        
        return self::createFromJson(file_get_contents($filename), $asArray);
    }

    public static function createFromJson(string $json, bool $asArray = true): self
    {
        return new self(json_decode($json, $asArray));
    }

    public function join(string $glue): P7String
    {
        return new P7String(implode($glue, $this->current));
    }
    
    /**
     * Reove ,ultiple values from current content
     *
     * @param [type] $flags
     * @return self
     */
    public function removeMultipleValues(int $flags = \SORT_REGULAR):self
    {
        $this->current = array_unique($this->current, $flags);
        return $this;    
    }

    /**
     * Saving current state
     *
     * @return self
     */
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
    /**
     * Implementing \Countable interface
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->current);
    }

    /**
     * Returning raw content
     *
     * @return array
     */
    public function raw(): array
    {
        return $this->current;
    }

    /**
     * Getting $num random keys from current content
     *
     * @param int $num
     * @return self
     */
    public function rand(int $num =1): self
    {
        $randomizr = SingletonFactory::get(Randomizer::class);
        return new self($randomizr->pickArrayKeys($this->current, $num));
    }

    /**
     * Shuffling order of values and changing keys
     *
     * @return self
     */
    public function shuffle(): self
    {   
        $this->save();
        $randomizr = SingletonFactory::get(Randomizer::class);
        $this->current = $randomizr->shuffleArray($this->current);
        return $this;
    }
}