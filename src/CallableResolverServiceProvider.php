<?php declare(strict_types=1);

namespace Ellipse\Middleware;

use Interop\Container\ServiceProviderInterface;

class CallableResolverServiceProvider implements ServiceProviderInterface
{
    public function getFactories()
    {
        return [];
    }

    public function getExtensions()
    {
        return [
            'ellipse.resolvers.middleware' => function ($container, callable $previous = null) {

                $previous = $previous ?: function ($element) {

                    return $element;

                };

                return new CallableResolver($previous);

            },
        ];
    }
}
