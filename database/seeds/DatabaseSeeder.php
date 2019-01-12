<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(ImagesSeeder::class);
    }

    /**
     * @return bool
     */
    protected function onProduction(): bool
    {
        return env('APP_ENV') === 'production';
    }
}
