<?php

declare(strict_types=1);
/**
 * Class representing general HTTP protocol
 * (methods, headers, other attributes etc.)
 *
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-10
 * 
 */

namespace SchrodtSven\P7WikiFoo\Communication\Http;

class Protocol
{
    public const VERSION_10 = '1.0';

    public const VERSION_11 = '1.1';

    public const VERSION_20 = '2.0';

    // Methods
    public const METHOD_OPTIONS = 'OPTIONS';

    public const METHOD_GET = 'GET';

    public const METHOD_HEAD = 'HEAD';

    public const METHOD_POST = 'POST';

    public const METHOD_PUT = 'PUT';

    public const METHOD_DELETE = 'DELETE';

    public const METHOD_PATCH = 'PATCH';

    public const METHOD_TRACE = 'TRACE';

    public const METHOD_CONNECT = 'CONNECT';

    // Character (sequences) with special meaning within HTTP
    
    public const HEADER_SEPARATOR = "\r\n";

    public const MESSAGE_SEPARATOR = "\r\n\r\n";

    public const HEADER_ASSIGNMENT = ':';

    /**
     * Array with valid HTTP request methods
     *
     * @var array
     */
    public const VALID_METHODS = array(
        self::METHOD_OPTIONS,
        self::METHOD_GET,
        self::METHOD_HEAD,
        self::METHOD_POST,
        self::METHOD_PUT,
        self::METHOD_DELETE,
        self::METHOD_TRACE,
        self::METHOD_CONNECT,
        self::METHOD_PATCH
    );

    /**
     * HTTP status codes acc.
     * to RFC 216 sec 10 'Status Code Definitions':
     *
     * Status code equals array key and value reason phrase
     *
     * @link http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html#sec10
     * @var array
     */
    public const STATUS_CODES = [        
        // Informational 1xx
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',

        // Successful 2xx
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-status',
        208 => 'Already Reported',

        // Redirection 3xx
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => 'Switch Proxy', // Deprecated
        307 => 'Temporary Redirect',

        // Client Error 4xx
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Time-out',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested range not satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        425 => 'Unordered Collection',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',

        // Server Error 5xx
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Time-out',
        505 => 'HTTP Version not supported',
        506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
        511 => 'Network Authentication Required'
    ];

    /**
     * *
     * Returning HTTP status codes
     *
     * @param bool $codeOnly
     * @return array
     */
    public static function getStatusCodes($codeOnly = false): array
    {
        return ($codeOnly) ? array_keys(self::STATUS_CODES) : self::STATUS_CODES;
    }

    /**
     * Returning status code line of HTTP response - example:
     * 
     * <code>
     * 200 OK
     * </code>
     *
     * @param integer $code
     * @return string
     */
    public static function getStatusCodeLine(int $code): string
    {
        return sprintf('%u %s', $code, self::STATUS_CODES[$code]);
    }

    /**
     * Returning valid request methods
     *
     * @return array
     */
    public static function getMethods() : array
    {
        return self::VALID_METHODS;
    }

    /**
     * Checking if given method is valid HTTP method 
     * 
     * @param string $method
     * @return bool
     */
    public static function isValidMethod(string $method): bool
    {
        return in_array(strtoupper($method), self::VALID_METHODS, true);
    }
}