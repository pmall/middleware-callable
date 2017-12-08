<?php declare(strict_types=1);

namespace Ellipse\Middleware;

use Interop\Http\Server\MiddlewareInterface;

class CallableResolver
{
    /**
     * The delegate.
     *
     * @var callable
     */
    private $delegate;

    /**
     * Set up a callable middleware resolver with the given delegate.
     *
     * @param callable $delegate
     */
    public function __construct(callable $delegate)
    {
        $this->delegate = $delegate;
    }

    /**
     * Create a middleware from the given callable or proxy the delegate.
     *
     * @param mixed $element
     * @return \Interop\Http\Server\MiddlewareInterface;
     */
    public function __invoke($element): MiddlewareInterface
    {
        if (is_callable($element)) {

            return new CallableMiddleware($element);

        }

        return ($this->delegate)($element);
    }
}
