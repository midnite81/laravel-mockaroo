<?php
namespace Midnite81\LaravelMockaroo\Database\Seeds;

use Illuminate\Database\Seeder;

class Mockaroo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenderSeeder::class);
        $this->call(TitleSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(EmployeeDepartmentSeeder::class);
        $this->call(NotesSeeder::class);
    }
}
