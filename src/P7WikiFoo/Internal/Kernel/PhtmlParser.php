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

class PhtmlParser
{
    private P7Array $contentData;

    public const RENDER_DOCUMENT = 'Documents/';
    public const RENDER_DOCLET = 'Doclets/';
    public const RENDER_WIDGET = 'Widgets/';
    public const RENDER_PARTLET = 'Partlets/';


    /**
     * Constructor function
     *
     * @param string $tplName
     */
    public function __construct(private string $tplName = 'default.doc.phtml')
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
     * Rendering phtml template
     *
     * @return string
     */
    public function render(string $tplType = self::RENDER_DOCUMENT): string
    {
        ob_start();
        require App::PHTML_TPL_DIR 
            . $tplType
            . $this->tplName;

        $out = ob_get_contents();
        ob_end_clean(); 
        return $out;
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
        return $this->contentData[$name] ?? null;
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
}