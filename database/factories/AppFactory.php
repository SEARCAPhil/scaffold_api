<?php

use Faker\Generator as Faker;

$factory->define(App\Apps::class, function (Faker $faker) {
    return [
        'name' => 'scaffold',
        'client_secret' => '1234',
    ];
});
