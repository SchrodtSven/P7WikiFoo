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


trait CodeBuildingTrait
{

    protected string $indentMark = ' ';

    protected int $indentWidth = 4;

    protected int $indentLevel = 1;


    public function indent(?int $level = null): self
    {
            if(is_null($level))
                                $level = $this->indentLevel;

            $this->current->prepend(str_repeat($this->indentMark, $this->indentWidth * $level));
            return $this;
    }

    

    /**
     * Get the value of indentLevel
     *
     * @return int
     */
    public function getIndentLevel(): int
    {
        return $this->indentLevel;
    }

    /**
     * Set the value of indentLevel
     *
     * @param int $indentLevel
     *
     * @return self
     */
    public function setIndentLevel(int $indentLevel): self
    {
        $this->indentLevel = $indentLevel;

        return $this;
    }
}
