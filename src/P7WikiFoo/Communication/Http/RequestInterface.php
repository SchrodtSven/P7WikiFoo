<?php

declare(strict_types=1);
/**
 * Interface for HTTP request classes
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-19
 * 
 */

namespace SchrodtSven\P7WikiFoo\Communication\Http;
use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;

interface RequestInterface
{
    public function __construct();
    public function getRequestUri(bool $withQueryString = true): string|null;
    public function setRequestUri(string $uri): self;
    public function getRequestMethod(): mixed;
    public function getHttpUpgradeInsecureRequests(): mixed;
    public function getRequestTimeFloat(): ?float;
    public function getRequestTime(): ?int;
    public function getParameters(): P7Array;

}