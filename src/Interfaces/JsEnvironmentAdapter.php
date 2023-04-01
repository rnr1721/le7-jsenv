<?php

namespace Core\Interfaces;

interface JsEnvironmentAdapter
{

    /**
     * Export data from array $key => $value to string
     * @param array $data
     * @return string
     */
    public function export(array $data = array()): string;
}
