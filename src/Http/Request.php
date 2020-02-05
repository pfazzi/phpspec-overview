<?php

namespace Http;

class Request
{
    private array $parameters;

    public function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    /**
     * @param null|int|string|bool|float $value
     */
    public function set(string $key, $value)
    {
        $this->parameters[$key] = $value;
    }

    /**
     * @return null|int|string|bool|float
     */
    public function get(string $key)
    {
        if (!$this->has($key)) {
            throw new \InvalidArgumentException();
        }

        return $this->parameters[$key];
    }

    public function has(string $key): bool
    {
        return isset($this->parameters[$key]);
    }
}
