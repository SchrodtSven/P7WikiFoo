<?php

declare(strict_types=1);
/**
 * trait for type conversion opoartions
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-11
 */

namespace SchrodtSven\P7WikiFoo\Internal\Type\Dry;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;
use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;

trait TypeConverterTrait
{
    /**
     * Yet quick& dirty ->  @FIXME
     *
     * @param mixed $value
     * @return void
     */
    public function p7stringify(mixed $value): P7String
    {
        return new P7String((string) $value);
    }

    /**
     * Yet quick& dirty ->  @FIXME
     *
     * @param mixed $value
     * @return void
     */
    public function p7stringifyFile(string $fileName): P7String
    {
        //@FIXME  if (!file_exists...)
        return new P7String(file_get_contents($fileName));
    }
}