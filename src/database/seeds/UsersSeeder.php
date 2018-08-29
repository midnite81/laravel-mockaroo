<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Midnite81\LaravelMockaroo\Models\User;

class UsersSeeder extends Seeder
{
    /** @var \Faker\Generator */
    protected $faker;

    /** @var int */
    protected $max = 10;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < $this->max; $i++) {
            $data = $this->getRandomData();
            User::create($data);
        }
    }

    /**
     * Return randomised data
     *
     * @return array
     */
    protected function getRandomData()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => Hash::make('password'),
            'remember_token' => null,
        ];
    }
}
