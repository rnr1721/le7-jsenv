<?php

declare(strict_types=1);

use Core\Interfaces\JsEnvironment;
use Core\Factories\JsEnvFactory;

require_once 'vendor/autoload.php';
require_once __DIR__ . '/../vendor/autoload.php';

class JsEnvTest extends PHPUnit\Framework\TestCase
{

    private JsEnvFactory $jsEnvFactory;

    protected function setUp(): void
    {
        $this->jsEnvFactory = new JsEnvFactory();
    }

    public function testHtml()
    {
        $jsEnv = $this->jsEnvFactory->getEnvHtml();
        $this->assertTrue($jsEnv instanceof JsEnvironment);
        $jsEnv->addOwn('url', 'http://site.com/ajax');
        $jsEnv->addOwn('locale', 'ru_RU');
        $jsEnv->addOwn('locale_short', 'ru');
        $jsEnv->addOwn('one', 1);
        $jsEnv->addOwn('two', 12.33);
        $jsEnv->addOwn('three', false);
        $jsEnv->addOwn('four', null);
        $jsEnv->addOwn('five', ["one", "two", "three"]);
        $count = $jsEnv->getEnvironment();
        $this->assertEquals(8, count($count));
        $this->assertEquals(290, strlen($jsEnv->export()));
    }

    public function testJson()
    {
        $jsEnv = $this->jsEnvFactory->getEnvJson();
        $this->assertTrue($jsEnv instanceof JsEnvironment);
        $jsEnv->addOwn('url', 'http://site.com/ajax');
        $jsEnv->addOwn('locale', 'ru_RU');
        $jsEnv->addOwn('locale_short', 'ru');
        $jsEnv->addOwn('one', 1);
        $jsEnv->addOwn('two', 12.33);
        $jsEnv->addOwn('three', false);
        $jsEnv->addOwn('four', null);
        $jsEnv->addOwn('five', ["one", "two", "three"]);
        $count = $jsEnv->getEnvironment();
        $this->assertEquals(8, count($count));
        $this->assertEquals(224, strlen($jsEnv->export()));
    }

}
