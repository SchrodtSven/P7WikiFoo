<?php

declare(strict_types=1);
/**
 * Factory creating html:
 * 
 *  - attributes
 *  - elements 
 *  - structs
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.25
 * @since 2023-05-22
 */

namespace SchrodtSven\P7WikiFoo\Entity\Frontend;

class HtmlSyntax
{
    public const ELEMENT_TPL = '<%s%s>%s</%s>';

    public const ELEMENT_TPL_MULTI = '<%s%s>
    %s
    </%s>';

    public const ATTRIB_ASSIGN = '%s = "%s"';


}