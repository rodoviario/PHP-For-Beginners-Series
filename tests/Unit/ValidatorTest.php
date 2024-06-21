<?php

it('validates a string', function () {
    $result = \Core\Validator::string('foobar');

    expect($result)->toBeTrue();
});