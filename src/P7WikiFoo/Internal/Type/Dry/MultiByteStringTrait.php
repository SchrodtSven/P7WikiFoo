<?php

declare(strict_types=1);
/**
 * Trait wrapping native Multibyte String Functions for usage in:
 * 
 *  - use SchrodtSven\P7WikiFoo\Internal\Type\P7Array
 *  - SchrodtSven\P7WikiFoo\Internal\Type\P7String;
 * 
 * @see https://www.php.net/manual/de/ref.mbstring.php
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-11
 */

namespace SchrodtSven\P7WikiFoo\Internal\Type\Dry;

use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;

class MultiByteStringTrait
{
    

        public function convertCase(string $string, int $mode, ?string $encoding): self
        {
            $this->current = mb_convert_case($this->current, $mode, $encoding);
            return $this;
        }
        

        public function strtoupper(string $string, ?string $encoding): self
        {
            $this->current = mb_strtoupper($this->current, $encoding);
            return $this;
        }
        

        public function strtolower(string $string, ?string $encoding): self
        {
            $this->current = mb_strtolower($this->current, $encoding);
            return $this;
        }
        

        public function language(?string $language): string|bool
        {
            return mb_language($language);
            
        }
        

        public function internalEncoding(?string $encoding): string|bool
        {
            return mb_internalEncoding($encoding);
            
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
            return mb_substituteCharacter($substituteCharacter);
            
        }
        

        public function parseStr(string $string): string
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
        

        public function strpos(string $haystack, string $needle, int $offset = 0, ?string $encoding): int|false
        {
            return mb_strpos($haystack, $needle, $offset, $encoding);
            
        }
        

        public function strrpos(string $haystack, string $needle, int $offset = 0, ?string $encoding): int|false
        {
            return mb_strrpos($haystack, $needle, $offset , $encoding);
            
        }
        

        public function stripos(string $haystack, string $needle, int $offset = 0, ?string $encoding): int|false
        {
            return mb_stripos($haystack, $needle, $offset, $encoding);
            
        }
        

        public function strripos(string $haystack, string $needle, int $offset = 0, ?string $encoding): int|false
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
        

        public function substrCount(string $haystack, string $needle, ?string $encoding): int
        {
            return mb_substr_count($haystack, $needle, $encoding);
            
        }
        

        public function substr(string $string, int $start, ?int $length, ?string $encoding): self
        {
            return new self(mb_substr($this->current, $start, $length, $encoding));
        }
        

        public function strcut(string $string, int $start, ?int $length, ?string $encoding): self
        {
            return new self(mb_strcut($this->current, $start, $length, $encoding));
    
        }
        

        public function strwidth(string $string, ?string $encoding): int
        {
            return mb_strwidth($this->current, $encoding);
            
        }
        

        public function strimwidth(string $string, int $start, int $width, string $trim_marker = '', ?string $encoding): self
        {
            $this->current = mb_strimwidth($this->current, $start, $width, $trim_marker = '', $encoding);
            return $this;
        }
        

        public function convertEncoding(string $toEncoding, array|string|null $fromEncoding = null): self
        {
            $this->content = mb_convertEncoding($this->current, $toEncoding, $fromEncoding);
            return $this;
        }
        

        public function detectEncoding(array|string|null $encodings = null, bool $strict = false): string|false
        {
            return mb_detectEncoding($this->current,$encodings, $strict);
            
        }
        

        public function listEncodings(): array
        {
            return mb_listEncodings();
            
        }
        

        public function encodingAliases(string $encoding): P7Array
        {
            return new P7Array(mbEncoding_aliases($encoding));
            
        }
        

        public function convertKana(string $string, string $mode = 'KV', ?string $encoding): self
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
        

        public function sendMail(
                    string $to, string $subject, string $message, array|string $additionalHeaders = [], ?string $additional_params
            ): bool
        {
            return mb_send_mail($to, $subject, $message, $additionalHeaders, $additional_params);
            
        }
        

        public function getInfo(string $type = 'all'): array|string|int|false
        {
            return mb_get_info($type = 'all');
            
        }
        

        public function checkEncoding(array|string|null $value = null, ?string $encoding): bool
        {
            return mb_checkEncoding($value, $encoding);
            
        }
        

        public function regexEncoding(?string $encoding): string|bool
        {
            return mb_regexEncoding($encoding);
            
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
            $this-current = mb_ereg_replace($pattern,$replacement, $this->current, $options);
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
        

        public function regexMatch(string $pattern, string $string, ?string $options): bool
        {
            return mb_ereg_match($pattern, $this->current, $options);
            
        }
        

        public function regexSearch(?string $pattern, ?string $options): bool
        {
            return mb_ereg_search($pattern, $options);
            
        }
        

        public function regexSearchPos(?string $pattern, ?string $options): array|false
        {
            return mb_ereg_search_pos($pattern, $options);
            
        }
        

        public function regexSearchRegs(?string $pattern, ?string $options): array|false
        {
            return mb_ereg_search_regs($pattern, $options);
            
        }
        

        public function regexSearchInit(?string $pattern, ?string $options): bool
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
