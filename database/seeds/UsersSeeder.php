<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class)->create([
            'active' => true,
            'name' => 'Milan Vugrinchev',
            'email' => 'milan.vugrinchev@bethebest.ltd',
            'password' => bcrypt(1),
        ]);

        factory(\App\Models\User::class, 4)->create();
    }

    /**
     * @return bool
     */
    protected function onProduction(): bool
    {
        return env('APP_ENV') === 'production';
    }
}
