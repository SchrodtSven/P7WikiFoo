<?php

declare(strict_types=1);
/**
 * Class for errors thrown if working on/with file system operations
 *
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-16
 */

namespace SchrodtSven\P7WikiFoo\Internal\File;


class FileError extends \Error
{
    /**
     * Matching code <-> message
     * @var array
     */
    public const MESSAGE_CODE_MATCH = [
        404 => 'The file resource %s could not be found!',
        666 => 'The devil is in the details - %s'
    ];
    
    /**
     * Constructor function
     *
     * @param string $message
     * @param integer $code
     * @param \Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, ?\Throwable $previous = null)
    {
        $message = sprintf(self::MESSAGE_CODE_MATCH[$code], $message);
        parent::__construct($message, $code, $previous);
    }
}