<?php

use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Image::class, 60)->create();
    }

    /**
     * @return bool
     */
    protected function onProduction(): bool
    {
        return env('APP_ENV') === 'production';
    }
}
