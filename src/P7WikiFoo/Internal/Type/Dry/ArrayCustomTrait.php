<?php
/**
 * Trait for custom needs
 * 
 * Providing possibility of accessing objects as arrays
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-19
 */



namespace SchrodtSven\P7WikiFoo\Internal\Type\Dry;

trait ArrayCustomTrait
{
    


    /**
     * Unsetting elements with empty values at [0] and [n]
     * 
     * @return self
     */
    public function unsetIfEmptyAtMargins(): self
    {   
        $this->save();
        $first = 0;
        $last = count($this)-1;
       
        if(empty($this->current[$first])) unset($this->current[$first]);
       
        if(empty($this->current[$last])) unset($this->current[$last]);
        return $this;
    }

}