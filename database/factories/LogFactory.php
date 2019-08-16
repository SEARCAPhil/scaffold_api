<?php

use Faker\Generator as Faker;

$factory->define(App\Logs::class, function (Faker $faker) {
    return [
        'pid' => 1,
        'action' => 'create',
        'type' => 'account'
    ];
});
