<?php

/* @var \Illuminate\Database\Eloquent\Factory $factory */

use CobraProjects\Multiauth\Model\Role;

$factory->define(Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});
