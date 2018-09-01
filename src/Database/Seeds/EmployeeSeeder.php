<?php
namespace Midnite81\LaravelMockaroo\Database\Seeds;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Midnite81\LaravelMockaroo\Models\Employee;
use Midnite81\LaravelMockaroo\Models\Gender;
use Midnite81\LaravelMockaroo\Models\Country;
use Faker\Generator;
use Midnite81\LaravelMockaroo\Models\Title;

class EmployeeSeeder extends Seeder
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
    public function __construct()
    {
        $this->faker = Factory::create('en-GB');
        $this->countries = [
            optional(Country::where('name', 'United Kingdom')->first())->id,
            optional(Country::where('name', 'United States')->first())->id,
        ];
        $this->genderMale = optional(Gender::where('name', 'Male')->first())->id;
        $this->genderFemale = optional(Gender::where('name', ['Female'])->first())->id;
        $this->titleMale = optional(Title::whereIn('name', ['Mr', 'Dr', 'Prof'])->get())->pluck('id');
        $this->titleFemale = optional(Title::whereIn('name', ['Miss', 'Mrs', 'Ms', 'Dr', 'Prof'])->get())->pluck('id');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 400; $i++) {
            $gender = rand(1, 2) == 1 ? 'male' : 'female';

            Employee::create([
                'gender_id' => $this->getGender($gender),
                'title_id' => $this->getTitle($gender),
                'manager_id' => null,
                'country_id' => $this->faker->shuffleArray($this->countries)[0],
                'first_name' => $this->faker->firstName($gender),
                'middle_names' => $this->faker->firstName($gender),
                'last_name' => $this->faker->lastName($gender),
                'date_of_birth' => $this->faker->dateTimeThisCentury->format('Y-m-d'),
                'national_insurance_no' => $this->faker->bankAccountNumber,
                'address_line_1' => $this->faker->streetAddress,
                'address_line_2' => preg_replace('/(\d+?(\s|$))/', '', $this->faker->streetAddress),
                'city' => $this->faker->city,
                'county_state' => $this->faker->amPm,
            ]);
        }
    }

    protected function getGender($gender)
    {
        if (strtolower($gender) == 'male') {
            return $this->genderMale;
        }
        return $this->genderFemale;
    }

    protected function getTitle($gender)
    {
        if (strtolower($gender) == 'male') {
            return $this->faker->shuffleArray($this->titleMale)[0];
        }
        return $this->faker->shuffleArray($this->titleFemale)[0];
    }
}
