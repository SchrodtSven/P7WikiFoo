<?php

declare(strict_types=1);
/**
 * Class for view models (returned by action controller action methods)
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.23
 * @since 2023-05-22
 */
namespace SchrodtSven\P7WikiFoo\Internal\Kernel;

use SchrodtSven\P7WikiFoo\App;
use SchrodtSven\P7WikiFoo\Internal\SingletonFactory;
use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;
use SchrodtSven\P7WikiFoo\Internal\Kernel\PhtmlParser;

class ViewModel implements \Stringable
{

    /**
     * @var string
     */
    public const GENERIC_DOCUMENT_TPL = 'default.doc';
    
    /**
     * Container array object holding contents to be rendered 
     *
     * @var P7Array
     */
    private P7Array $contentData;

    private string $docTpl;

    private string $actionTpl;

    private PhtmlParser $parser;

    public function __construct()
    {
        $this->parser = SingletonFactory::get(PhtmlParser::class);
    }
    /**
     * Setter for content parts
     *
     * @param string $name
     * @param mixed $value
     * @return self
     */
    public function set(string $name, mixed $value): self
    {
        $this->contentData[$name] = $value;
        return $this;
    }

    /**
     * Getter for content parts
     *
     * @param string $name
     * @return mixed
     */
    public function get(string $name): mixed
    {
        return $this->contentData[$name] ?? null;
    } 

    /**
     * Setter interceptor 
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function __set(string $name, mixed $value): void
    {
        $this->set($name, $value);
    }

    /**
     * Getter interceptor 
     *
     * @param string $name
     * @return mixed
     */
    public function __get(string $name): mixed
    {
        return $this->get($name) ?? null;
    }
    
    /**
     * Isset interceptor 
     *
     * @param string $name
     * @return boolean
     */
    public function __isset(string $name): bool
    {
        return isset($this->contentData[$name]);
    }

    /**
     * Unset interceptor 
     *
     * @param string $name
     * @return void
     */
    public function __unset(string $name): void
    {
        unset($this->contentData[$name]);
    }

    /**
     * Stringifying interceptor 
     *
     * @FIXME
     * @return string
     */
    public function __toString(): string
    {
        return $this->parser->render();
    }

    /**
     * Returning result of last rendering process
     *
     * @return P7String
     */
    public function getRendered(): P7String 
    { 
        return $this->rendered; 
    }

    
    /**
     * Getter for document template
     *
     * @return string
     */
    public function getDocTpl(): string 
    { 
        return $this->docTpl; 
    }
    
    /**
     * Setter for document template
     *
     * @param string $docTpl
     * @return self
     */
    public function setDocTpl(string $docTpl): self 
    { 
        $this->docTpl = $docTpl; 
        return $this; 
    }

    /**
     * Get the value of actionTpl
     *
     * @return string
     */
    public function getActionTpl(): string
    {
        return $this->actionTpl;
    }

    /**
     * Set the value of actionTpl
     *
     * @param string $actionTpl 
     * @return self
     */
    public function setActionTpl(string $actionTpl): self
    {
        $this->actionTpl = $actionTpl;
        return $this;
    }
}