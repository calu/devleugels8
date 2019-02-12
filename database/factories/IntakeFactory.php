<?php

use Illuminate\Support\Str;
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

$factory->define(App\Intake::class, function (Faker $faker) {
    return [
        'voornaam' => $faker->firstName,
		'familienaam' => $faker->lastName,
		'straat' => $faker->streetName,
		'huisnummer' => $faker->buildingNumber,
		'bus' => $faker->secondaryAddress,
		'postcode' => $faker->postcode,
		'gemeente' => $faker->city,
		'telefoon' => $faker->phoneNumber,
		'gsm' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'rubriek' => 'hotel',
		'vraag' => $faker->text($maxNbChars = 50),
		'openstaand' => $faker->numberBetween($min=0, $max=1)
    ];
});
