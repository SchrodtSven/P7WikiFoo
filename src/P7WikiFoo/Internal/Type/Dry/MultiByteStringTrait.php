<?php

declare(strict_types=1);
/**
 * Trait wrapping native Multibyte String Functions for usage in:
 * 
 *  - SchrodtSven\P7WikiFoo\Internal\Type\P7Array
 *  - SchrodtSven\P7WikiFoo\Internal\Type\P7String;
 * 
 * @see https://www.php.net/manual/de/ref.mbstring.php
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-11
 * 
 * @FIXME !!!
 */

namespace SchrodtSven\P7WikiFoo\Internal\Type\Dry;

use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;

trait MultiByteStringTrait
{
    

        public function convertCase(string $string, int $mode, ?string $encoding): self
        {
            $this->current = mb_convert_case($this->current, $mode, $encoding);
            return $this;
        }
        

        public function upper(?string $encoding = null): self
        {
            $this->current = mb_strtoupper($this->current, $encoding);
            return $this;
        }
        

        public function lower(?string $encoding = null): self
        {
            $this->current = mb_strtolower($this->current, $encoding);
            return $this;
        }
        

        public function language(?string $language): string|bool
        {
            return mb_language($language);
            
        }
        

        public function internal_encoding(?string $encoding): string|bool
        {
            return mb_internal_encoding($encoding);
            
        }
        

        public function httpInput(?string $type): array|string|false
        {
            return mb_http_input($type);
            
        }
        

        public function httpOutput(?string $encoding): string|bool
        {
            return mb_http_output($encoding);
            
        }
        

        public function detectOrder(array|string|null $encoding = null): array|bool
        {
            return mb_detect_order($encoding);
            
        }
        

        public function substituteCharacter(string|int|null $substituteCharacter = null): string|int|bool
        {
            return mb_substitute_character($substituteCharacter);
            
        }
        
        /**
         * Parse GET/POST/COOKIE data and set global variable
         *
         * @param string $string
         * @return string
         */
        public function parseStr(string $string): mixed
        {
            mb_parse_str($this->current, $result);
            return $result;
            
        }
        

        public function outputHandler(string $string, int $status): self
        {
            $this->current = mb_output_handler($this->current, $status);
            return $this;
        }
        

        public function preferredMimeName(string $encoding): string|false
        {
            return mb_preferred_mime_name($encoding);
            
        }
        

        public function strlen(string $string, ?string $encoding): int
        {
            return mb_strlen($this->current, $encoding);
            
        }
        
        /**
         * Find position of $nefirst occurrence of string in a string
         *
         * @param string $haystack
         * @param integer $offset
         * @param string|null $encoding
         * @return integer|false
         */
        public function pos(string $needle, int $offset = 0, ?string $encoding = null): int|false
        {
            return mb_strpos($needle, $this->current, $offset, $encoding);
            
        }
        

        public function strrpos(string $haystack, string $needle, int $offset = 0, ?string $encoding = null): int|false
        {
            return mb_strrpos($haystack, $needle, $offset , $encoding);
            
        }
        

        public function stripos(string $haystack, string $needle, int $offset = 0, ?string $encoding = null): int|false
        {
            return mb_stripos($haystack, $needle, $offset, $encoding);
            
        }
        

        public function strripos(string $haystack, string $needle, int $offset = 0, ?string $encoding = null): int|false
        {
            return mb_strripos($haystack, $needle, $offset, $encoding);
            
        }
        

        public function strstr($haystack,  $needle, $beforeNeedle, $encoding): string|false
        {
            return mb_strstr($haystack,  $needle, $beforeNeedle, $encoding);
            
        }
        

        public function strrchr($haystack,  $needle, $beforeNeedle, $encoding): string|false
        {
            return mb_strrchr($haystack,  $needle, $beforeNeedle, $encoding);
            
        }
        

        public function stristr($haystack,  $needle, $beforeNeedle, $encoding): string|false
        {
            return mb_stristr($haystack,  $needle, $beforeNeedle, $encoding);
            
        }
        

        public function strrichr($haystack,  $needle, $beforeNeedle, $encoding): string|false
        {
            return mb_strrichr($haystack,  $needle, $beforeNeedle, $encoding);
            
        }
        

        public function substrCount(string $haystack, string $needle, ?string $encoding = null): int
        {
            return mb_substr_count($haystack, $needle, $encoding);
            
        }
        

        public function substr(int $start, ?int $length, ?string $encoding = null): self
        {
            return new self(mb_substr($this->current, $start, $length, $encoding));
        }
        

        public function cut(int $start, ?int $length, ?string $encoding = null): self
        {
            return new self(mb_strcut($this->current, $start, $length, $encoding));
    
        }
        

        public function width(string $string, ?string $encoding = null): int
        {
            return mb_strwidth($this->current, $encoding);
            
        }
        

        public function trimWidth(string $string, int $start, int $width, string $trim_marker = '', ?string $encoding  = null): self
        {
            $this->current = mb_strimwidth($this->current, $start, $width, $trim_marker = '', $encoding);
            return $this;
        }
        

        public function convert_encoding(string $toEncoding, array|string|null $fromEncoding = null): self
        {
            $this->content = mb_convert_encoding($this->current, $toEncoding, $fromEncoding);
            return $this;
        }
        

        public function detect_encoding(array|string|null $encodings = null, bool $strict = false): string|false
        {
            return mb_detect_encoding($this->current,$encodings, $strict);
            
        }
        

        public function listEncodings(): array
        {
            return mb_list_encodings();
            
        }
        

        public function encodingAliases(string $encoding): P7Array
        {
            return new P7Array(mb_encoding_aliases($encoding));
            
        }
        

        public function convertKana(string $string, string $mode = 'KV', ?string $encoding  = null): self
        {
            $this->current = mb_convert_kana($this->current, $mode, $encoding);
            return $this;
        }
        

        public function encodeMimeheader(?string $charset, ?string $transferEncoding, string $newline = "\n", int $indent = 0): self
        {
            $this->current = mb_encode_mimeheader($this->current, $charset, $transferEncoding, $newline, $indent);
            return $this;
        }
        

        public function decodeMimeheader(string $string): self
        {
            $this->current = mb_decode_mimeheader($this->current);
            return $this;
        }
        

        public function convertVariables(string $toEncoding, array|string $fromEncoding, mixed &...$vars): string|false
        {
            return mb_convert_variables($toEncoding, $fromEncoding, ...$vars);
            
        }
        

        public function encodeNumericentity(string $string, array $map, ?string $encoding = null, bool $hex = false): self
        {
            $this->current = mb_encode_numericentity($this->current, $map, $encoding, $hex);
            return $this;
        }
      
        public function getInfo(string $type = 'all'): array|string|int|false
        {
            return mb_get_info($type = 'all');
            
        }
        

        public function check_encoding(array|string|null $value = null, ?string $encoding = null): bool
        {
            return mb_check_encoding($value, $encoding);
            
        }
        

        public function regex_encoding(?string $encoding  = null): string|bool
        {
            return mb_regex_encoding($encoding);
            
        }
        

        public function regexSetOptions(?string $options): self
        {
            $this->current = mb_regex_set_options($options);
            return $this;
        }
        
        // @FIXME
        public function regex(string $pattern, &$matches): bool
        {
            return mb_ereg($this->current, $matches);
            
        }
        
        // @FIXME
        public function regexi(string $pattern, &$matches): bool
        {
            return mb_eregi($pattern, $this->current, $matches);
            
        }
        

        public function regexReplace(string $pattern, string $replacement, string $string, ?string $options = null): self
        {
            $this->current = mb_ereg_replace($pattern,$replacement, $this->current, $options);
            return $this;
        }
        

        public function regexReplaceCallback(string $pattern, callable $callback, string $string, ?string $options = null): string|false|null
        {
            return mb_ereg_replace_callback($pattern,$callback, $this->current, $options);
            
        }
        

        public function regexiReplace(string $pattern, $replacement, string $string, ?string $options = null): string|false|null
        {
            return mb_eregi_replace($pattern, $replacement, $this->current, $options);
            
        }
        

        public function split(string $pattern, int $limit = -1): array|false
        {
            return mb_split($pattern, $this->current, $limit);
            
        }
        

        public function regexMatch(string $pattern, string $string, ?string $options = null): bool
        {
            return mb_ereg_match($pattern, $this->current, $options);
            
        }
        

        public function regexSearch(?string $pattern, ?string $options = null): bool
        {
            return mb_ereg_search($pattern, $options);
            
        }
        

        public function regexSearchPos(?string $pattern, ?string $options = null): array|false
        {
            return mb_ereg_search_pos($pattern, $options);
            
        }
        

        public function regexSearchRegs(?string $pattern, ?string $options = null): array|false
        {
            return mb_ereg_search_regs($pattern, $options);
            
        }
        

        public function regexSearchInit(?string $pattern, ?string $options = null): bool
        {
            return mb_ereg_search_init($this->current, $pattern, $options);
            
        }
        

        public function regexSearchGetregs(): array|false
        {
            return mb_ereg_search_getregs();
            
        }
        

    

        public function regexSearchSetpos(int $offset): bool
        {
            return mb_ereg_search_setpos($offset);
            
        }
    }
