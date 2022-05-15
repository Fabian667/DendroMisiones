<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Menu::class, function (Faker $faker)
 {
    $name = $faker->name;
    $menus = App\Menu::all();
    return [
        'name' => $name,
        'slug' => Str::slug($name)   ,
        'parent' => (count($menus) > 0) ? $faker->randomElement($menus->pluck('id')->toArray()) : 0,
        'order' => 0
    ];

 });


