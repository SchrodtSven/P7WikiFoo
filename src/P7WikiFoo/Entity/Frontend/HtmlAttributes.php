<?php

declare(strict_types=1);
/**
 * Entity class for HTML attributes 
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

class HtmlAttributes
{
    protected P7Array $container;

    public function __construct(array $data = [])
    {
        $this->container = new P7Array($data);
    }

    public function set(string $name, string $value): self
    {
        $this->container[$name] = $value;
        return $this;
    }

    public function get(string $name) : string
    {
        return $this->container[$name] ?? '';
    }

    public function render(): string
    {
        if(!count($this->container))
            return '';
        $tmp = new P7Array();
        $this->container->walk(function($value, $key) use($tmp) {
            $tmp->push(sprintf(HtmlSyntax::ATTRIB_ASSIGN, $key, $value));
        });

        return (string) $tmp->join((', '))->prepend(' ');
    }

    public function __toString(): string 
    {
        return $this->render();
    }

}

