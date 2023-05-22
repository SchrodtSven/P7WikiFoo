<?php

declare(strict_types=1);
/**
 * Class representing http repsonse(s)
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-10
 * 
 */

namespace SchrodtSven\P7WikiFoo\Communication\Http;

use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;


class Response
{
    private string $headers;

    private string $payload;

    private string  $statusLine = '';

    private P7Array $parsedHeaders;

    private int $statusCode;

    public function __construct()
    {
        $this->parsedHeaders = new P7Array([]);
    }

    /**
     * @return string
     */
    public function getHeaders(): string
    {
        return $this->headers;
    }

    /**
     * @param string $headers
     * @return Response
     */
    public function setHeaders(string $headers): self
    {
        $this->headers = $headers;
        return $this;
    }


    /**
     * @param string $name
     * @param string $value
     * @return $this
     */
    public function setParsedHeader(string $name, string $value): self
    {
        $this->parsedHeaders[$name] = $value;
        header(sprintf('%s: %s', $name, $value));
        return $this;
    }

    public function getParsedHeader(string $name)
    {
        return $this->parsedHeaders[$name];
    }

    /**
     * @return string
     */
    public function getPayload(): string
    {
        return $this->payload;
    }

    /**
     * @param string $payload
     * @return Response
     */
    public function setPayload(string $payload): self
    {
        $this->payload = $payload;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusLine(): string
    {
        return $this->statusLine;
    }

    /**
     * @param string $statusLine
     * @return Response
     */
    public function setStatusLine(string $statusLine): self
    {
        $this->statusLine = $statusLine;
        return $this;
    }

    /**
     * @return P7Array|P7String
     */
    public function getParsedHeaders(): P7Array|P7String
    {
        return $this->parsedHeaders;
    }

    /**
     * @param P7Array|P7String $parsedHeaders
     * @return Response
     */
    public function setParsedHeaders(P7Array|P7String $parsedHeaders): self
    {
        $this->parsedHeaders = $parsedHeaders;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return Response
     */
    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * Parsing response string
     *
     * @param string $response
     * @return self
     */
    public static function parseResponseString(string $response): self
    {
        $instance = new self();
        $tmp = (new P7String($response))->splitBy(Protocol::MESSAGE_SEPARATOR);
        $instance->setHeaders($tmp[0]);
        $instance->setPayload($tmp[1]);
        $tmp = (new P7String($instance->headers))->splitBy(Protocol::HEADER_SEPARATOR);
        $instance->setStatusLine($tmp->shift());
        $tmp->walk(function($item) use($instance){
            $t = (new P7String($item))->splitBy(': ');
            $instance->setParsedHeader($t[0], $t[1]);
            
        });
        return $instance;
    }
}