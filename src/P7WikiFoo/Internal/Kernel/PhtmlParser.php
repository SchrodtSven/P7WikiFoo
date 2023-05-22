<?php

declare(strict_types=1);
/**
 * Class for parsing *.phtml (templates in alterntive PHP syntax)
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.23
 * @since 2023-05-22
 */
namespace SchrodtSven\P7WikiFoo\Internal\Kernel;

use SchrodtSven\P7WikiFoo\App;
use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;

class PhtmlParser implements \Stringable
{
    /**
     * Container array object holding contents to be rendered
     *
     * @var P7Array
     */
    private P7Array $contentData;

    /**
     * Sub folder name for Document templates
     * 
     * @var string
     */
    public const RENDER_DOCUMENT = 'Documents/';
    
    /**
     * Sub folder name for Doclet (special partials of HTML document - header;footer;script;style;link;meta ) templates
     * 
     * @var string
     */
    public const RENDER_DOCLET = 'Doclets/';

    /**
     * Sub folder name for Widget (date picker; calculator; colour picker etc.) templates
     * 
     * @var string
     */
    
    public const RENDER_WIDGET = 'Widgets/';
    
    /**
     * Sub folder name for Partlet (other HTML snippets) templates
     * 
     * @var string
     */
    public const RENDER_PARTLET = 'Partlets/';

    /**
     * File suffix for templates
     * 
     * @var string
     */
    public const TPL_SUFFIX = '.phtml';

    /**
     * Rendering Type 
     * 
     * @see self::RENDER_*
     *
     * @var string
     */
    private string $tplType = self::RENDER_DOCUMENT;

    /**
     * Result of last rendering process
     */
    private P7String $rendered;


    /**
     * Constructor function
     *
     * @param string $tplName
     */
    public function __construct(private string $tplName = 'default.doc')
    {
        $this->contentData = new P7Array();        
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
     * Getter for template Name
     *
     * @param string $name
     * @return self
     */
    public function getTplName(): string
    {
        return $this->tplName;
    }

    /**
     * Setter for template Name
     *
     * @param string $name
     * @return self
     */
    public function setTplName(string $name): self
    {
        $this->tplName = $name;
        return $this;
    }

    /**
     * Getter for template Type
     *
     * @return string
     */
    public function getTplType(): string 
    { 
        return $this->tplType; 
    }

    /**
     * Setter for template Type
     *
     * @param string $tplType
     * @return self
     */
    public function setTplType(string $tplType): self 
    { 
        $this->tplType = $tplType; return $this; 
    }

    /**
     * Rendering phtml template
     *
     * @return string
     */
    public function render(): P7String
    {
        // Starting output buffering
        ob_start();

        // include template
        require App::PHTML_TPL_DIR 
            . $this->tplType
            . $this->tplName
            . self::TPL_SUFFIX;

        // save buffered output    
        $out = ob_get_contents();
        
        // stop output buffering
        ob_end_clean(); 
        return $this->rendered = new P7String($out);
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
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
}