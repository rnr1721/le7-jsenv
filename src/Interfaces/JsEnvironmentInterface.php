<?php

namespace Core\Interfaces;

interface JsEnvironmentInterface
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
     * @param bool $escapeString Escape if value if string
     * @return self
     */
    public function addOwn(string
            $key,
            mixed $value,
            bool $escapeString = true
    ): self;

    /**
     * Add multiple items from array
     * @param array $items Key=>Value array 
     * @param bool $escapeString Escape string values
     * @return self
     */
    public function addMultiple(
            array $items,
            bool $escapeString = true
    ): self;

    /**
     * Export to string in some format (by Adapter)
     * @return string Exported value
     */
    public function export(): string;
}
