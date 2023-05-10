<?php

declare(strict_types=1);
/**
 * Interface defining stack operation API
 *
 *  @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-10
 */


namespace SchrodtSven\P7WikiFoo\Internal\Type;

interface StackInterface
{
   public function push(mixed $value): self;
   
   public function pop(): mixed;

   public function unshift(mixed $value): self;

   public function shift(): mixed;

}