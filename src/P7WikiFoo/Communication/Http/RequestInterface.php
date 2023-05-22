<?php

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