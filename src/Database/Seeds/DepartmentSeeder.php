<?php

namespace Midnite81\LaravelMockaroo\Database\Seeds;

use Faker\Generator;
use Illuminate\Database\Seeder;
use Midnite81\LaravelMockaroo\Models\Country;
use Midnite81\LaravelMockaroo\Models\Department;
use Midnite81\LaravelMockaroo\Models\Location;

class DepartmentSeeder extends Seeder
{
    /**
     * @var Generator
     */
    protected $faker;

    /**
     * DepartmentSeeder constructor.
     *
     * @param Generator $faker
     */
    public function __construct(Generator $faker)
    {
        $this->faker = $faker;
        $this->locations = optional(Location::all())->pluck('id');
    }

    public function run()
    {
        if (! empty($this->getDepartments())) {
            foreach ($this->getDepartments() as $department) {
                    Department::updateOrCreate(['name' => $department], [
                        'name' => $department,
                        'location_id' => $this->faker->shuffleArray($this->locations)[0]
                ]);
            }
        }
    }

    /**
     * Get Genders
     *
     * @return array
     */
    protected function getDepartments()
    {
        return [
            'Customer Service',
            'Development',
            'Finance',
            'Human Resources',
            'Marketing',
            'Production',
            'Quality Management',
            'Production',
            'Research',
            'Sales',
        ];
    }

}
