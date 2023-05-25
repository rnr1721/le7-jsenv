<?php

namespace Core\JsEnv\Adapters;

use Core\Interfaces\JsEnvironmentAdapterInterface;
use function is_string,
             is_int,
             is_float,
             is_null,
             is_array,
             json_encode;

class JsEnvHtml implements JsEnvironmentAdapterInterface
{

    /**
     * @inheridDoc
     */
    public function export(array $data = array()): string
    {
        if (count($data) === 0) {
            return '';
        }
        $result = "<script>\r\n";
        foreach ($data as $item => $value) {
            if (is_string($value)) {
                $result .= "    const $item = '$value';\r\n";
            }
            if (is_int($value) || is_float($value)) {
                $result .= "    const $item = $value;\r\n";
            }
            if (is_null($value)) {
                $result .= "    const $item = null;\r\n";
            }
            if (is_bool($value)) {
                $value = ($value === true ? 'true' : 'false');
                $result .= "    const $item = $value;\r\n";
            }
            if (is_array($value)) {
                $result .= "    const $item = '" . json_encode($value) . "';\r\n";
            }
        }
        $result .= "</script>\r\n";
        return $result;
    }

}
