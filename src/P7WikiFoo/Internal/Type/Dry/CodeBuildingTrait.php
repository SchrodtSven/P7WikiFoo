<?php
/**
 * Collection functions fopr source code creation
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-01
 */
namespace SchrodtSven\P7WikiFoo\Internal\Type\Dry;
use SchrodtSven\P7WikiFoo\Internal\Data\NamedSymbols;

trait CodeBuildingTrait
{

    /**
     * Indent mark ()' ' by default)
     *
     * @var string
     */
    protected string $indentMark = ' ';

    /**
     * Width of indentation
     *
     * @var integer
     */
    protected int $indentWidth = 4;

    /**
     * Level of indentation
     *
     * @var integer
     */
    protected int $indentLevel = 1;


    /**
     * Indenting content by $level or current self::indentLevel
     *
     * @param int|null $level
     * @return self
     */
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

    /**
     * Quote current content with $mark and corresponing end character
     *
     * @param string $mark
     * @return self
     */
    public function quote(string $mark = NamedSymbols::SINGLE_QUOTES_START): self
    {
        $this->embrace($mark);
        return $this;
    }
}
