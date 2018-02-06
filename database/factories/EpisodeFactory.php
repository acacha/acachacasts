<?php

use Faker\Generator as Faker;

$factory->define(App\Episode::class, function (Faker $faker) {
    return [
        'serie_id' => function () {
            return factory(App\Serie::class)->create()->id;
        },
    ];
});
