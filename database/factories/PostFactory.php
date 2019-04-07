<?php

use Faker\Generator as Faker;

$factory->define(SuperGamer\Post::class, function (Faker $faker) {
    $title=$faker->sentence(4);
    return [
        'user_id'       =>  rand(1,30),
        'category_id'   =>  rand(1,20),
        'title'         =>  $title,
        'slug'          =>  str_slug($title),
        'excerpt'       =>  $faker->text(200),
        'body'          =>  $faker->text(500),
        'file'          =>  $faker->imageUrl($width=1200, $height=400),
        'status'        =>  $faker->randomElement(['DRAFT', 'PUBLISHED'])
    ];
});
