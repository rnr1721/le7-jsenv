<?php

namespace Core\Factories;

use Core\Interfaces\JsEnvironmentAdapter;
use Core\Interfaces\JsEnvironment;
use Core\JsEnv\Adapters\JsEnvHtml;
use Core\JsEnv\Adapters\JsEnvJson;
use Core\JsEnv\JsEnvDefault;

class JsEnvFactory
{

    public function getEnvJson(): JsEnvironment
    {
        $envJson = new JsEnvJson();
        return $this->getEnv($envJson);
    }

    public function getEnvHtml(): JsEnvironment
    {
        $envHtml = new JsEnvHtml();
        return $this->getEnv($envHtml);
    }

    public function getEnv(JsEnvironmentAdapter $method): JsEnvironment
    {
        return new JsEnvDefault($method);
    }

}
