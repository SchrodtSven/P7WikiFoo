<?php
/**
 * Trait wrapping native functions testing strings:
 * 
 * - begins, ends, contains
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-11
 */

namespace SchrodtSven\P7WikiFoo\Internal\Type\Dry;
use SchrodtSven\P7WikiFoo\Internal\Data\NamedSymbols;
use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;

trait StringBoolTrait
{
    // Simple string comparison methods

    /**
     * Checking if current string content begins with $begin
     *
     * @param string $begin
     * @return boolean
     */
    public function begins(string $begin): bool
    {
        return \str_starts_with($this->current, $begin);
    }

    /**
     *  Checking if current string content ends with $ends     
     *
     * @param string $end
     * @return boolean
     */
    public function ends(string $end): bool
    {
        return \str_ends_with($this->current, $end);
    }

    /**
     *  Checking if current string content contains $needle
     *
     * @param string $needle
     * @return boolean
     */
    public function contains(string $needle): bool
    {
        return \str_contains($this->current, $needle);
    }

    /**
     * Checkin if current string content matches against regular expression $pattern
     *
     * @param string $pattern
     * @param array|null $matches
     * @param integer $flags
     * @param integer $offset
     * @return P7Array
     */
    public function matchesRegExp(string $pattern, array &$matches = null,int $flags = 0, int $offset = 0): P7Array
    {
        $result = preg_match($pattern, $this->current, $matches, $flags, $offset);
        $matches['result'] = $result;
        return new P7Array($matches);
    }
}