<?php

declare(strict_types=1);

namespace Core\JsEnv;

use Core\Interfaces\JsEnvironment;
use Core\Interfaces\JsEnvironmentAdapter;

class JsEnvDefault implements JsEnvironment
{

    /**
     * Data for environment
     * @var array
     */
    private array $vars = [];
    
    /**
     * Method for export environment
     * @var JsEnvironmentAdapter
     */
    private JsEnvironmentAdapter $jsEnv;

    public function __construct(JsEnvironmentAdapter $jsEnv)
    {
        $this->jsEnv = $jsEnv;
    }

    public function getEnvironment(): array
    {
        return $this->vars;
    }

    public function addOwn(string $key, mixed $value): self
    {
        if (is_array($value)) {
            $value = json_encode($value);
        }
        if (is_string($value)) {
            $this->vars[htmlentities($key)] = htmlentities($value);
        } else {
            $this->vars[htmlentities($key)] = $value;
        }
        return $this;
    }

    public function export(): string
    {
        return $this->jsEnv->export($this->getEnvironment());
    }

}
