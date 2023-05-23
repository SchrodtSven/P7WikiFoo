<?php

declare(strict_types=1);
/**
 * HTML syntax describing class
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
    /**
     * Template for non-empty element
     * 
     * @var string
     */
    public const ELEMENT_TPL = '<%s%s>%s</%s>';

    /**
     * Template for non-empty element      
     *  
     * @var string
     */
    public const EMPTY_ELEMENT_TPL = '<%s%s />';

    /**
     * Template for non-empty element multi lined
     * 
     * @FIXME -> format/beautify
     * @var string
     */
    public const ELEMENT_TPL_MULTI = '<%s%s>
    %s
    </%s>';

    /**
     * Template for attribute assignment - example:
     * <code>
     * 
     * name = "value"
     * 
     * </code>
     * 
     * @var string
     */
    public const ATTRIB_ASSIGN = '%s = "%s"';


}