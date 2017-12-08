# Callable middleware resolver

This package provides a resolver producing Psr-15 middleware from callables.

**Require** php >= 7.1

**Installation** `composer require ellipse/middleware-callable`

**Run tests** `./vendor/bin/kahlan`

- [Using the callable middleware resolver](#using-the-callable-middleware-resolver)

## Using the callable middleware resolver

```php
<?php

namespace App;

use Ellipse\Middleware\CallableResolver;

// Create a resolver with a delegate for non callable element.
$resolver = new CallableResolver(function ($element) {

    // $element is not a callable, just return it.

    return $element;

});

// Produce a Psr-15 middleware from a callable.
$middleware = $resolver(function ($request, $handler) {

    // ... Some processing.

    // Return a response.
    return $handler->process($request);

});
```
