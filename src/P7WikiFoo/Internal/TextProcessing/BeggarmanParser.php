<?php

declare(strict_types=1);
/**
 * Very basic template parser replacing placeholders ({{PLACE_HOLDER_NAME}} by default)  
 * and using native *printf functions
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-11
 */


namespace SchrodtSven\P7WikiFoo\Internal\TextProcessing;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;
use SchrodtSven\P7WikiFoo\Internal\Type\Dry\TypeConverterTrait;
use SchrodtSven\P7WikiFoo\App;
use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\TextProcessing\TplContainer;

class BeggarmanParser
{
    use TypeConverterTrait;

    private array $find;

    private array $repl;

    private string $plHo = '{{%s}}';

    private P7Array $tags;

    

    public function __construct(private null|P7String|string $tpl = null)
    {
        if(!is_null($this->tpl))
                        $this->sanitize();
        $this->tags = new P7Array();                
    }

    public static function createFromTplFile(string $tplName): self
    {
        return (new self())->loadTpl($tplName);
    }

    public function __set(string $name, mixed $value): void
    {
        $this->set($name, $value);
    }

    public function set(string $name, mixed $value): self
    {
        $this->find[] = sprintf($this->plHo, $name);
        $this->repl[] = $value;
        return $this;
    }

    public function render(): P7String
    {
        if(count($this->tags)) {
            $this->TAGS = $this->tags->join(PHP_EOL);
        }
        return $this->tpl->replace($this->find, $this->repl);
    }
    

    /**
     * Get the value of tpl
     */
    public function getTpl(): P7String
    {
        return $this->tpl;
    }

    /**
     * Set the value of tpl
     */
    public function setTpl(P7String|string $tpl): self
    {
        $this->tpl = $tpl;
        $this->sanitize();
        return $this;
    }

    /**
     * Loading tpl file 
     *
     * @param string $tplName
     * @return self
     */
    public function loadTpl(string $tplName): self
    {
        $this->tpl = $this->p7stringifyFile(
                                            implode (   '', [
                                                                App::CHEAP_TPL_DIR,
                                                                $tplName,
                                                                '.tpl'
                                                        ]
                                            )
        );
        return $this;
    }

    /**
     * Adding line with tag to DocBlock - e.g.
     * <code>
     *  * @param int $foo
     * </code>
     *
     * @param string $tag
     * @param string $value
     * @return void
     */
    public function addTagLine(string $tag, string $value)
    {
        $this->tags->push(sprintf(TplContainer::DOC_BLOCK_TAG, $tag, $value));
    }

    public static function createFromFile(string $tplName): self
    {
        return (new self())->loadTpl($tplName);
    }

    private function sanitize(): void
    {
        if(! $this->tpl instanceof P7String) {
            $this->tpl = $this->p7stringify($this->tpl);
        }
    }
}