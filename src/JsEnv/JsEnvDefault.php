<?php

declare(strict_types=1);

namespace Core\JsEnv;

use Core\Interfaces\JsEnvironmentInterface;
use Core\Interfaces\JsEnvironmentAdapterInterface;

class JsEnvDefault implements JsEnvironmentInterface
{

    /**
     * Data for environment
     * @var array
     */
    private array $vars = [];

    /**
     * Method for export environment
     * @var JsEnvironmentAdapterInterface
     */
    private JsEnvironmentAdapterInterface $jsEnv;

    public function __construct(JsEnvironmentAdapterInterface $jsEnv)
    {
        $this->jsEnv = $jsEnv;
    }

    /**
     * @inheridDoc
     */
    public function getEnvironment(): array
    {
        return $this->vars;
    }

    /**
     * @inheridDoc
     */
    public function addOwn(
            string $key,
            mixed $value,
            bool $escapeString = true
    ): self
    {
        if (is_array($value)) {
            $value = json_encode($value);
        }
        if (is_string($value)) {
            if ($escapeString) {
                $value = htmlentities($value);
            }
        }
        $this->vars[htmlentities($key)] = $value;

        return $this;
    }

    /**
     * @inheridDoc
     */
    public function addMultiple(array $items, bool $escapeString = true): self
    {
        foreach ($items as $key => $value) {
            $this->addOwn($key, $value, $escapeString);
        }
        return $this;
    }

    /**
     * @inheridDoc
     */
    public function export(): string
    {
        return $this->jsEnv->export($this->getEnvironment());
    }

}
