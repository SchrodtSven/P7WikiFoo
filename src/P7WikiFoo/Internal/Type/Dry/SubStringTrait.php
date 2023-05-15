<?php
/**
 * Collection of functionality operations for sub strings by:
 * 
 * - RegExp(s)
 * - Rule(s)
 * - Rule Definition(s)
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-05-01
 */
namespace SchrodtSven\P7WikiFoo\Internal\Type\Dry;

use SebastianBergmann\CodeCoverage\Driver\PathExistsButIsNotDirectoryException;

trait SubStringTrait
{
    /**
     * Getting sub string enclosed by $start and $end - $start and $end will be quoted for regex context
     * 
     * @param string $start 
     * @param string $end 
     * @return self
     */
    public function stringsBetween(string $start, string $end): self
    {
            $start = preg_quote($start);
            $end = preg_quote($end);
            $pattern = "/{$start}(.*){$end}/U"; // ungreedy modififer
            preg_match_all($pattern, $this->current, $txt);
            $this->current = $txt[1][0];
            return $this;
    }
}
