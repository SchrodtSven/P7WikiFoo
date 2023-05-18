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

namespace SchrodtSven\P7WikiFoo\Communication\Http;

use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;


class CurlClient implements ClientInterface
{
    private \CurlHandle $curlHandle;

    private string $uri;

    private Response $response;

    private P7Array $parameters;

    private Parser $parser;

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
        $this->init();
        $this->setUri($uri);
        $this->parameters = new P7Array([]);
        
        $this->parser = new Parser;

    }

    private function init()
    {


       
        // Creating cUrl handle

        $this->curlHandle = \curl_init();

        
        // Returning response instead of writing to STDOUT
        $this->setCurlOption(\CURLOPT_RETURNTRANSFER, true);

        // Setting timeout for connection creation
        $this->setCurlOption(\CURLOPT_CONNECTTIMEOUT, $this->ttl);

        // Reading response headers
        $this->setCurlOption( CURLINFO_HEADER_OUT, 1);

        // Setting TTL for running cUrl functions
        $this->setCurlOption(\CURLOPT_TIMEOUT, $this->ttl);

        // Reading response headers
        $this->setCurlOption(\CURLOPT_HEADER, 1);

        // Disabling SSL peer check
        $this->setCurlOption(\CURLOPT_SSL_VERIFYPEER, false);

        // Setting UA
        $this->setCurlOption(\CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/113.0');

    }

    /**
     * Processing HTTP request
     *
     * @param string $uri
     * @param string $method
     * @return self
     */
    public function process(string $uri, string $method = Protocol::METHOD_GET) : self
    {

        $this->setMethod($method);
        if($uri!='')
            $this->setUri($uri);
        
        $queryString = http_build_query($this->parameters->raw());
        switch ($this->method) {

            case Protocol::METHOD_GET:
            case Protocol::METHOD_DELETE;
                // For GET and DELETE we send parameters within URI as query string
                //@FIXME
                $this->uri .= '?' . $queryString;
                break;

            case Protocol::METHOD_POST:
            case Protocol::METHOD_PUT:    
            case Protocol::METHOD_PATCH:
                // For PUT, PATCH and POST we send parameters in payload
                $this->setCurlOption(\CURLOPT_POSTFIELDS, $queryString);
                break;

        }
       
        $this->response = Response::parseResponseString(curl_exec($this->curlHandle));
        $this->response->setStatusCode(curl_getinfo($this->curlHandle, CURLINFO_HTTP_CODE));
        return $this;
    }

    /**
     * Getting current HTTP method
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Setting cUrl option
     *
     * @param integer $option
     * @param [type] $value
     * @return void
     */
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
        $this->setCurlOption(\CURLOPT_CUSTOMREQUEST, $this->method);
        return $this;
    }

    /**
     * Setting named parameters
     *
     * @param array $parameters
     * @return self
     */
    public function setParameters(array $parameters): self
    {
        $this->parameters = new P7Array($parameters);
        return $this;
    }

    /**
     * GEtting parameters
     *
     * @return P7Array
     */
    public function getParameters(): P7Array
    {
        return $this->parameters;
    }

    /**
     * Setting named parameter
     *
     * @param string $name
     * @param string $value
     * @return self
     */
    public function setParameter(string $name, string $value): self
    {
        $this->parameters[$name] = $value;
        return $this;
    }

    /**
     * Getting named parameter
     *
     * @param string $name
     * @return string
     */
    public function getParameter(string $name): string
    {
        return $this->parameters[$name];
    }

   /**
    * Getting URI
    *
    * @return string
    */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * Setting URI
     *
     * @param string $uri
     * @return self
     */
    public function setUri(string $uri): self
    {
        // Setting URI for current request
        // as member
        $this->uri = $uri;
        // in cUrl
        $this->setCurlOption(\CURLOPT_URL, $this->uri);
        return $this;
    }

  
    /**
     * Getter for TTL
     *
     * @return integer
     */
    public function getTtl(): int
    {
        return $this->ttl;
    }

    /**
     *  Setter for TTL
     *
     * @param integer $ttl
     * @return self
     */
    public function setTtl(int $ttl): self
    {
        $this->ttl = $ttl;
        return $this;
    }

    /**
     * Getter for response
     *
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * Send POST request
     *
     * @param string $uri
     * @return self
     */
    public function post(string $uri = ''): self
    {
        $this->process($uri, Protocol::METHOD_POST);
        return $this;
    }

    /**
     * Send PUT request
     *
     * @param string $uri
     * @return self
     */
    public function put(string $uri = ''): self
    {
        $this->process($uri, Protocol::METHOD_PUT);
        return $this;
    }

    /**
     * Send GET request
     *
     * @param string $uri
     * @return self
     */
    public function get(string $uri = ''): self
    {
        $this->process($uri, Protocol::METHOD_GET);
        return $this;
    }

    /**
     * Send DELETE request
     *
     * @param string $uri
     * @return self
     */
    public function delete(string $uri = ''): self
    {
        $this->process($uri, Protocol::METHOD_DELETE);
        return $this;
    }

    /**
     * Send PATCH request
     *
     * @param string $uri
     * @return self
     */
    public function patch(string $uri = ''): self
    {
        $this->process($uri, Protocol::METHOD_PATCH);
        return $this;
    }

}