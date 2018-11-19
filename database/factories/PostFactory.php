<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->numerify('Title ###'),
        'url' => $faker->url,
        'description' => $faker->text,
        'user' => $faker->name,
    ];
});
