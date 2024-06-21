<?php

it('validates a string', function () {
    expect(\Core\Validator::string('foobar'))->toBeTrue();
});