<?php

use function Eloquent\Phony\Kahlan\stub;
use function Eloquent\Phony\Kahlan\mock;

use Interop\Http\Server\MiddlewareInterface;

use Ellipse\Middleware\CallableResolver;
use Ellipse\Middleware\CallableMiddleware;

describe('CallableResolver', function () {

    beforeEach(function () {

        $this->delegate = stub();

        $this->resolver = new CallableResolver($this->delegate);

    });

    describe('->__invoke()', function () {

        context('when the given element is a callable', function () {

            it('should return it wrapped inside a CallableMiddleware', function () {

                $element = stub();

                $test = ($this->resolver)($element);

                $middleware = new CallableMiddleware($element);

                expect($test)->toEqual($middleware);

            });

        });

        context('when the given element is not a callable', function () {

            it('should proxy the delegate', function () {

                $element = 'element';

                $middleware = mock(MiddlewareInterface::class)->get();

                $this->delegate->with('element')->returns($middleware);

                $test = ($this->resolver)($element);

                expect($test)->toBe($middleware);

            });

        });

    });

});
