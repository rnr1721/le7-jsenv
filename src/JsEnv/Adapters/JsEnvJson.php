<?php

namespace Core\JsEnv\Adapters;

use Core\Interfaces\JsEnvironmentAdapter;

class JsEnvJson implements JsEnvironmentAdapter
{

    public function export(array $data = array()): string
    {
        return json_encode($data);
    }

}
