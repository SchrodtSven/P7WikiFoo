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
    /**
     * Quoting pattern for usage in (PCRE) regular expressions
     *
     * @return self
     */
    public function quoteForRegExp(): self
    {
        $this->current = preg_quote($this->current);
        return $this;
    }

    /**
     * Encoding string for context URI
     *
     * @return self
     */
    public function encodeForUri(): self
    {
        $this->current = urlencode($this->current);
        return $this;
    }

    /**
     * Decode URI encoded string
     *
     * @param string $encoded
     * @return self
     */
    public function decodeFromUri(string $encoded): self
    { 
        return new self(urldecode($encoded));
    }

    /**
     * Adding c strle slashes
     *
     * @param string $characters
     * @return self
     */
    public function addCSlashes(string $characters): self
    { 
        $this->current = addcslashes($this->current, $characters);
        return $this;
    }
    /**
     * Adding slashes to special characters
     * @return self
     */
    public function addSlashes(): self
    { 
        $this->current = addslashes($this->current);
        return $this;
    }

    /**
     * Uuedecoding string
     *
     * @return string|false
     */
    public function uuDecode(): string|false
    {
        return convert_uudecode($this->current);
    }

    /**
     * UUencoding string
     *
     * @return string
     */
    public function uuEncode(): string
    {
        return convert_uuencode($this->current);
    }

    /**
     * Encoding string to printed quotable 
     *
     * @return self
     */
    public function encodeQuotetdPrintable(): self
    {
        return new self(quoted_printable_encode($this->current));
    }

    /**
     * Decoding printed quotable encoded string 
     *
     * @param string $encoded
     * @return self
     */
    public function decodeQuotedPrintable(string $encoded): self
    {
        return new self(quoted_printable_decode($encoded));
    }
}