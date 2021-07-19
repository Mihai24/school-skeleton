<?php

namespace School\Traits;

trait SchoolConfiguration
{
    private array $configuration;

    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }
}