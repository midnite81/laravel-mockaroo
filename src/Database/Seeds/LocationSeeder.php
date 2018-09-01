<?php

namespace Midnite81\LaravelMockaroo\Database\Seeds;

use Faker\Generator;
use Illuminate\Database\Seeder;
use Midnite81\LaravelMockaroo\Models\Country;
use Midnite81\LaravelMockaroo\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * @var Generator
     */
    protected $faker;

    /**
     * LocationSeeder constructor.
     *
     * @param Generator $faker
     */
    public function __construct(Generator $faker)
    {
        $this->faker = $faker;
        $this->countries = [
           optional(Country::where('name', 'United Kingdom')->first())->id,
           optional(Country::where('name', 'United States')->first())->id,
        ];
    }

    public function run()
    {
        for ($i = 1; $i < 21; $i++) {
            $location = $this->faker->streetName;
            Location::updateOrCreate(['name' => $location], [
                'name' => $location,
                'country_id' => $this->faker->shuffleArray($this->countries)[0]
            ]);
        }
    }

}
