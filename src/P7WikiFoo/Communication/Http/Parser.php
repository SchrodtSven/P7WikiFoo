<?php

declare(strict_types=1);
/**
 * Class for parsing http elements (messages, uris ...)
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2022-08-11
 * 
 */

namespace P7WikiFoo\Communication\Http;

use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;

class Parser
{
    /**
     * Parsing URI  
     * 
     * @param string $uri
     * @param integer $component
     * @return mixed
     */
    public function parseUri(string $uri, int $component = -1): mixed
    {
        return parse_url($uri, $component);
    }

    /**
     * Getting URI part
     *
     * @param string $uri
     * @param string $part
     * @return P7String|null
     */
    public function getUriPart(string $uri, string $part): ?P7String
    {
        $tmp = $this->parseUri($uri);
        return (array_key_exists($part, $tmp))
            ? new P7String($tmp[$part])
            : null;
    }

    /**
     * Splitting message to header and body part (separated by CRLFCRLF)
     * 
     * @FIXME - optimize message splitting (header size) --> multipart messages exist!
     *
     * @param string $message
     * @return array
     */
    public function splitMessage(string $message): P7Array
    {
        return (new P7String($message))->splitBy(Protocol::MESSAGE_SEPARATOR);
    }

    /**
     * Parsing query string
     *
     * @param string $queryString
     * @return P7Array
     */
    public function parseQueryString(string $queryString): P7Array
    {
        mb_parse_str($queryString, $data);
        return new P7Array($data);
    }

    /**
     * Building query string from native data types - to native data type
     *
     * @param array|object $data
     * @param string $numericPrefix
     * @param string|null $argSeparator
     * @param [type] $encodingType
     * @return string
     */
    public function buildQueryStringNDT(
                                        array|object $data,
                                        string $numericPrefix = "",
                                        ?string $argSeparator = null,
                                        int $encodingType = \PHP_QUERY_RFC1738
    ): string
    {
        return http_build_query($data, $numericPrefix, $argSeparator, $encodingType);
    }

    /**
     * Building query string 
     *
     * @param P7Array $data
     * @param string $numericPrefix
     * @param string|null $argSeparator
     * @param [type] $encodingType
     * @return P7String
     */
    private function buildQueryString(
                                        P7Array $data,
                                        string $numericPrefix = "",
                                        ?string $argSeparator = null,
                                        int $encodingType = \PHP_QUERY_RFC1738
    ): P7String
    {
        return new P7String(http_build_query($data->raw(), $numericPrefix, $argSeparator, $encodingType));
    }
}
