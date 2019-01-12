<?php

use App\Models\Category;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Image::class, function (Faker $faker) {
    $category_id = random_int(1,5);
    $category = Category::find($category_id);

    return [
        'user_id' => random_int(1, 5),
        'category_id' => $category_id,
        'title' => $category->title . '_' . $category_id . '_' . random_int(0,999),
        'asset' => '/storage/uploads/' . $faker->image(storage_path('app/public/uploads'), 640, 480, $category->title, false),
        'description' => $faker->text
    ];
});
