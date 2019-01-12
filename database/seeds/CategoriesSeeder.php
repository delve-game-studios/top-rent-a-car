<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Category::class, 5)->create();
    }

    /**
     * @return bool
     */
    protected function onProduction(): bool
    {
        return env('APP_ENV') === 'production';
    }
}
