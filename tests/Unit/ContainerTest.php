<?php

use Core\Container;

test('It can resolve something out of the container', function () {
    // arrange
    $container = new Container();

    // $container->bind('foo', function () {
    //     return 'foo';
    // })
    // esta arrow function es equivalente a la de arriba, pero corta
    $container->bind('foo', fn() => 'foo');

    // act
    $result = $container->resolve('foo');

    // assert/expect
    expect($result)->toEqual('foo');

});
