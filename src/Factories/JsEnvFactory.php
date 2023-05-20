<?php

namespace Core\Factories;

use Core\Interfaces\JsEnvironmentAdapterInterface;
use Core\Interfaces\JsEnvironmentInterface;
use Core\JsEnv\Adapters\JsEnvHtml;
use Core\JsEnv\Adapters\JsEnvJson;
use Core\JsEnv\JsEnvDefault;

class JsEnvFactory
{

    public function getEnvJson(): JsEnvironmentInterface
    {
        $envJson = new JsEnvJson();
        return $this->getEnv($envJson);
    }

    public function getEnvHtml(): JsEnvironmentInterface
    {
        $envHtml = new JsEnvHtml();
        return $this->getEnv($envHtml);
    }

    public function getEnv(
            JsEnvironmentAdapterInterface $method
    ): JsEnvironmentInterface
    {
        return new JsEnvDefault($method);
    }

}
