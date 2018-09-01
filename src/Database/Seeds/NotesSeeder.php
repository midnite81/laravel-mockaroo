<?php
namespace Midnite81\LaravelMockaroo\Database\Seeds;

use Illuminate\Database\Seeder;
use Faker\Generator;
use Midnite81\LaravelMockaroo\Models\Employee;

class NotesSeeder extends Seeder
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
        $this->employees = Employee::inRandomOrder()->limit(20)->get();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->employees as $employee) {
            $employee->notes()->create([
                'notes' => $this->faker->words(rand(15, 45), true),
            ]);
        }
    }
}
