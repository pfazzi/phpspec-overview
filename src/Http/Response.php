<?php

namespace Http;

class Response
{
    private ?string $content;
    private int $statusCode;

    public function __construct(?string $content = null, int $statusCode = 200)
    {
        $this->content = $content;
        $this->statusCode = $statusCode;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public static function create(?string $content = null, int $statusCode = 200)
    {
        return new self($content, $statusCode);
    }
}
