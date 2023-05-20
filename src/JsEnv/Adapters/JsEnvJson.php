<?php

namespace Core\JsEnv\Adapters;

use Core\Interfaces\JsEnvironmentAdapterInterface;

class JsEnvJson implements JsEnvironmentAdapterInterface
{

    public function export(array $data = array()): string
    {
        return json_encode($data);
    }

}
