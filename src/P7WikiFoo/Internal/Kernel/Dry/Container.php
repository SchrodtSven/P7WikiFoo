<?php

declare(strict_types=1);
/**
 * Class container objects offering magical functions and “classic” setter/getter
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.23
 * @since 2023-05-23
 */
namespace SchrodtSven\P7WikiFoo\Internal\Kernel\Dry;

use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;

class Container
{
    /**
     * Contructor function
     *
     * @param P7Array|null $store
     */
    public function __construct(protected ?P7Array $store = null)
    {
        if(is_null($this->store)) 
                        $this->store = new P7Array();
    }

    /**
     * Setter for named container element
     *
     * @param string $name
     * @param mixed $value
     * @return self
     */
    public function set(string $name, mixed $value): self
    {
        $this->store[$name] = $value;
        return $this;
    }

    /**
     * Getter for named container element
     *
     * @param string $name
     * @return mixed
     */
    public function get(string $name): mixed
    {
        return $this->store[$name] ?? null;
    }

    /**
    * Check if named property exists
    *
    * @param string $name
    * @return boolean
    */
   public function has(string $name): bool
   {
        return isset($this->store[$name]);
   }

   /**
    * Unsetter for named property
    *
    * @param string $name
    * @return void
    */
   public function unset(string $name): void
   {
        unset($this->store[$name]);
   }

   /**
    * Rollback to empty container
    *
    */
   public function reset(): void
   {
        $this->store = new P7Array();
   }

   /**
    * Getter for complete content
    *
    * @return P7Array
    */
   public function getAll(): P7Array
   {
        return $this->store;
   }

   /**
    * Getting raw (PHP native) array
    *
    * @return array
    */
   public function raw(): array
   {
        return $this->store->raw();
   }
}