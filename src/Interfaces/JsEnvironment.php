<?php

namespace Core\Interfaces;

interface JsEnvironment
{

    /**
     * Get data as array
     * @return array
     */
    public function getEnvironment(): array;

    /**
     * Add own item to JS Environment by $key => $value
     * @param string $key Var name
     * @param mixed $value Var value
     * @return self
     */
    public function addOwn(string $key, mixed $value): self;

    /**
     * Export to string in some format (by Adapter)
     * @return string
     */
    public function export(): string;
}
