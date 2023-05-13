<?php

declare(strict_types=1);
/**
 * Class representing http response(s)
 * 
 * @FIXME -> use P7WikiFoo\Communication\Http\Parser!!
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2022-05-11
 * 
 */

namespace P7WikiFoo\Communication\Http;

use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;


class CurlClient implements ClientInterface
{
    private \CurlHandle $curlHandle;

    private string $uri;

    private Response $response;

    private P7Array $parameters;


    /**
     * Used HTTP request method
     *
     * @var string
     */
    private string $method;

    /**
     * Used time to live for connection in seconds
     *
     * @var int
     */
    private int $ttl = 500;


    public function __construct(string $uri = 'https://www.example.org/')
    {
        if (!function_exists('curl_version')) {
            throw new \ErrorException('Extension cURL needed!');
        }
        $this->uri = $uri;
        $this->parameters = new P7Array([]);
        $this->curlHandle = curl_init();

    }

    private function init()
    {


        $this->setCurlOption(\CURLOPT_CUSTOMREQUEST, $this->method);
        //Sending header within response

        // Setting URI for current request
        $this->setCurlOption(CURLOPT_URL, $this->uri);

        // Returning response instead of writing to STDOUT
        $this->setCurlOption(CURLOPT_RETURNTRANSFER, true);

        // Setting timeout for connection creation
        $this->setCurlOption(CURLOPT_CONNECTTIMEOUT, $this->ttl);

        // Reading response headers
        $this->setCurlOption( CURLINFO_HEADER_OUT, 1);

        // Setting TTL for running cUrl functions
        $this->setCurlOption(CURLOPT_TIMEOUT, $this->ttl);

        // Reading response headers
        $this->setCurlOption(CURLOPT_HEADER, 1);

        // Disabling SSL peer check
        $this->setCurlOption(CURLOPT_SSL_VERIFYPEER, false);

    }

    public function process(string $uri, string $method = Protocol::METHOD_GET) : self
    {

        $this->setMethod($method);

        if ($uri != '') {
            $this->uri = $uri;
        }
        
        $queryString = http_build_query($this->parameters->raw());
        switch ($this->method) {

            case Protocol::METHOD_GET:
            case Protocol::METHOD_DELETE;
                // For GET and DELETE we send parameters within URI as query string
                $this->uri .= '?' . $queryString;
                break;

            case Protocol::METHOD_POST:
            case Protocol::METHOD_PUT:    
            case Protocol::METHOD_PATCH:
            case 'PUT':
                // For PUT, PATCH and POST we send parameters in payload
                $this->setCurlOption(CURLOPT_POSTFIELDS, $queryString);
                break;

        }
        $this->init();
        $this->response = Response::parseResponseString(curl_exec($this->curlHandle));
        $this->response->setStatusCode(curl_getinfo($this->curlHandle, CURLINFO_HTTP_CODE));
        return $this;
    }

    
    public function getMethod(): string
    {
        return $this->method;
    }

    public function setCurlOption(int $option, $value)
    {
        curl_setopt($this->curlHandle, $option, $value);
    }

    /**
     * @param string $method
     * @return CurlClient
     */
    public function setMethod(string $method): self
    {
        $this->method = strtoupper($method);
        return $this;
    }

    public function setParameters(array $parameters): self
    {
        $this->parameters = new P7Array($parameters);
        return $this;
    }

    public function getParameters(): P7Array
    {
        return $this->parameters;
    }

    public function setParameter(string $name, string $value): self
    {
        $this->parameters[$name] = $value;
        return $this;
    }

    public function getParameter(string $name):string
    {
        return $this->parameters[$name];
    }

   
    public function getUri(): string
    {
        return $this->uri;
    }

    public function setUri(string $uri): self
    {
        $this->uri = $uri;
        return $this;
    }

  
    public function getTtl(): int
    {
        return $this->ttl;
    }

  
    public function setTtl(int $ttl): self
    {
        $this->ttl = $ttl;
        return $this;
    }


    public function getResponse(): Response
    {
        return $this->response;
    }

    public function post(string $uri = ''): self
    {
        $this->process($uri, Protocol::METHOD_POST);
        return $this;
    }

    public function put(string $uri = ''): self
    {
        $this->process($uri, Protocol::METHOD_PUT);
        return $this;
    }

    public function get(string $uri = ''): self
    {
        $this->process($uri, Protocol::METHOD_GET);
        return $this;
    }

    public function delete(string $uri = ''): self
    {
        $this->process($uri, Protocol::METHOD_DELETE);
        return $this;
    }

    public function patch(string $uri = ''): self
    {
        $this->process($uri, Protocol::METHOD_PATCH);
        return $this;
    }

}