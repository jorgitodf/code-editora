<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\CodeEduUser\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\CodeEduBook\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => ucfirst($faker->unique()->word),
    ];
});

$factory->define(\CodeEduBook\Models\Book::class, function (Faker\Generator $faker) {

    $repository = app(\CodeEduUser\Repositories\UserRepository::class);
    $userId = $repository->all()->random()->id;

    return [
        'title' => ucfirst($faker->word),
        'subtitle' => $faker->sentence(3),
        'price' => $faker->randomFloat(2, 10, 100),
        'user_id' => $userId
    ];
});
