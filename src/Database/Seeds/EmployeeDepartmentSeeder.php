<?php
namespace Midnite81\LaravelMockaroo\Database\Seeds;

use Illuminate\Database\Seeder;
use Midnite81\LaravelMockaroo\Models\Department;
use Midnite81\LaravelMockaroo\Models\Employee;
use Faker\Generator;

class EmployeeDepartmentSeeder extends Seeder
{
    /**
     * @var Generator
     */
    protected $faker;

    protected $employees;

    protected $departments;

    /**
     * LocationSeeder constructor.
     *
     * @param Generator $faker
     */
    public function __construct(Generator $faker)
    {
        $this->faker = $faker;
        $this->employees = Employee::all();
        $this->departments = optional(Department::all())->pluck('id');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->employees as $employee) {
            $employee->department()->attach($this->faker->shuffleArray($this->departments)[0]);
        }
    }
}
