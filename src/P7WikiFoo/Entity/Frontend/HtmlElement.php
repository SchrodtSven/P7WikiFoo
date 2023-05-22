<?php

declare(strict_types=1);
/**
 * Entity class for HTML elements 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.25
 * @since 2023-05-22
 */

namespace SchrodtSven\P7WikiFoo\Entity\Frontend;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;
use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;

class HtmlElement
{
    

    public function __construct(
                                protected string $name, 
                                protected mixed $content = '',
                                protected ?HtmlAttributes $attributes = null
    ) 
    {
        
    }

    public function render(): string
    {

        $attr = ' id="FOO23"';
        return sprintf(HtmlSyntax::ELEMENT_TPL,
                                                $this->name,
                                                (string) $this->attributes,
                                                $this->content,
                                                $this->name

                );
    }
    protected bool $isEmpty = false;

    public function getName()
    { 
        return $this->name; 
    }

    public function setName($name): self 
    { 
        $this->name = $name; return $this; 
    }
    
    public function getContent(): P7Array 
    { 
        return $this->content; 
    }
    
    public function setContent(P7Array $content): self 
    { 
        $this->content = $content; return $this; 
    }

    public function getAttributes(): HtmlAttributes
    { 
        return $this->attributes; 
    }

    public function setAttributes(HtmlAttributes $attributes): self 
    { 
        $this->attributes = $attributes; return $this; 
    }
}

