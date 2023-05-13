<?php
/**
 * Collection of static functions matching sub strings by:
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


trait SubStringTrait
{
    /**
     * Getting sub string enclosed by $start and $end - $start and $end will be quoted for regex context
     * 
     * Example usage & output:
     * <code>
     *   echo SubStringMatcher::stringsBetween('Foo [bar] baz',
     *                                     '[',
     *                                     ']'     
     *                                      ); // bar
     * 
     * var_dump(SubStringMatcher::stringsBetween('Foo bar {{baz 1 2 }} 4','{{','}}',false));
     * 
     * //array(2) {
     * //  [0]=>
     * //  array(1) {[0]=>string(12) "{{baz 1 2 }}"
     * //  }
     * //  [1]=>     
     * // array(1) { [0]=> string(8) "baz 1 2 "
     * //  }
     * // }

     * 
     *  
     * </code>
     * 
     * @param string $string 
     * @param string $start 
     * @param string $end 
     * @return string | array
     */
    public function stringsBetween(
            string $start, 
            string $end, 
            bool $isolatedStringOnly = true
    ): self
    {
            
            $start = preg_quote($start);
            $end = preg_quote($end);
            $pattern = "/{$start}(.*){$end}/U"; // ungreedy modififer
            preg_match_all($pattern, $this->current, $txt);
            $this->current = $txt[1][0];
            return $this;
    }
}
