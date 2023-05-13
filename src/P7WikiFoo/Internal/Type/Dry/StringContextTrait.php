<?php
/**
 * Trait wrapping native functions to code/decode strings for usage in different contexts:
 * 
 * - quote
 * - encode
 * - decode
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-13
 */

namespace SchrodtSven\P7WikiFoo\Internal\Type\Dry;
use SchrodtSven\P7WikiFoo\Internal\Data\NamedSymbols;
use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;

trait StringContextTrait
{
    public function quoteForRegExp(): self
    {
        $this->current = preg_quote($this->current);
        return $this;
    }

    public function encodeForUri(): self
    {
        $this->current = urlencode($this->current);
        return $this;
    }

    public function decodeFromUri(string $encoded): self
    { 
        return new self(urldecode($encoded));
    }

    public function addCSlashes(string $characters): self
    { 
        $this->current = addcslashes($this->current, $characters);
        return $this;
    }

    public function addSlashes(): self
    { 
        $this->current = addslashes($this->current);
        return $this;
    }

    public function uuDecode(): string|false
    {
        return convert_uudecode($this->current);
    }

    public function uuEncode(): string
    {
        return convert_uuencode($this->current);
    }

    public function encodeQuotetdPrintable(): self
    {
        return new self(quoted_printable_encode($this->current));
    }

    public function decodeQuotetdPrintable(string $encoded): self
    {
        return new self(quoted_printable_decode($encoded));
    }
}