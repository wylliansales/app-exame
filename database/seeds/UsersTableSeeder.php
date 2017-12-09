<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class)->create([
            'name'      => 'Admin',
            'email'     => 'admin@admin.com',
            'password'  => bcrypt('123@123'),
            'remember_token'    => str_random(10)
        ]);
    }
}
