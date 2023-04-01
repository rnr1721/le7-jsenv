# le7-jsenv
JS variable environment for le7 PHP MVC framework or any PHP project

This is simple classes for transfer some data to Javascript, such as
API addresses, AJAX callback URLs etc.

## Requirements

- PHP 8.1 or higher.
- Composer 2.0 or higher.

## What it can?

- Transfer data from PHP to JS as constants
- Store data type as possible - bool, int, float, string (array will be converted to string JSON)

## Installation

```shell
composer require rnr1721/le7-jsenv
```

## Testing

```shell
composer test
```

## How it works?

```php
use Core\Factories\JsEnvFactory;

    $jsEnvFactory = new JsEnvFactory();
    $jsEnv = $jsEnvFactory->getEnvHtml();

    $jsEnv->addOwn('url', 'http://site.com/ajax')
        ->addOwn('locale', 'ru_RU')
        ->addOwn('locale_short', 'ru');

    $jsEnv->addOwn('one', 1);
    $jsEnv->addOwn('two', 12.33);
    $jsEnv->addOwn('three', false);
    $jsEnv->addOwn('four', null);
    $jsEnv->addOwn('five', ["one", "two", "three"]);

    $output = $jsEnv->export();

```

This example give us the next string that you can place on your webpage:

```html
<script>
    const url = 'http://site.com/ajax';
    const locale = 'ru_RU';
    const locale_short = 'ru';
    const one = 1;
    const two = 12.33;
    const three = false;
    const four = null;
    const five = '[&quot;one&quot;,&quot;two&quot;,&quot;three&quot;]';
</script>
```
