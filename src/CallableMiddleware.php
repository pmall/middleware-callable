<?php declare(strict_types=1);

namespace Ellipse\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use Interop\Http\Server\MiddlewareInterface;
use Interop\Http\Server\RequestHandlerInterface;

class CallableMiddleware implements MiddlewareInterface
{
    /**
     * The callable to proxy.
     *
     * @var callable
     */
    private $callable;

    /**
     * Set up a callable middleware proxying the given callable.
     *
     * @param callable $callable
     */
    public function __construct(callable $callable)
    {
        $this->callable = $callable;
    }

    /**
     * Return the response produced by the callable.
     *
     * @param \Psr\Http\Message\ServerRequestInterface      $request
     * @param \Interop\Http\Server\RequestHandlerInterface  $handler
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return ($this->callable)($request, $handler);
    }
}
