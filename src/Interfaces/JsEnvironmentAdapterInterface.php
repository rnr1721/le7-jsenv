<?php

namespace Core\Interfaces;

interface JsEnvironmentAdapterInterface
{

    /**
     * Export data from array $key => $value to string
     * @param array $data
     * @return string
     */
    public function export(array $data = array()): string;
}
