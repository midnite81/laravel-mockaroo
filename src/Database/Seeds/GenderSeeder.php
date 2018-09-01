<?php

namespace Midnite81\LaravelMockaroo\Database\Seeds;

use Illuminate\Database\Seeder;
use Midnite81\LaravelMockaroo\Models\Gender;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! empty($this->getGenders())) {
            foreach ($this->getGenders() as $gender) {
                Gender::updateOrCreate(['name' => $gender], ['name' => $gender]);
            }
        }
    }

    /**
     * Get Genders
     *
     * @return array
     */
    protected function getGenders()
    {
        return [
            'Male',
            'Female'
        ];
    }
}
