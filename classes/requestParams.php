<?php

class RequestParams
{
    public function __construct(private array $params)
    {
    }

    public function get($key): ?string
    {
        return isset($this->params[$key]) ? $this->params[$key] : null;
    }

    public function has($key): bool
    {
        return isset($this->params[$key]);
    }

    public function all(): ?array
    {
        return $this->params;
    }
}
