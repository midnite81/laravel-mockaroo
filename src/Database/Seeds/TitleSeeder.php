<?php
namespace Midnite81\LaravelMockaroo\Database\Seeds;

use Illuminate\Database\Seeder;
use Midnite81\LaravelMockaroo\Models\Title;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! empty($this->getTitles())) {
            foreach ($this->getTitles() as $title) {
                Title::updateOrCreate(['name' => $title], ['name' => $title]);
            }
        }
    }

    /**
     * Get Genders
     *
     * @return array
     */
    protected function getTitles()
    {
        return [
            'Mr',
            'Mrs',
            'Miss',
            'Ms',
            'Prof',
            'Dr',
        ];
    }
}
