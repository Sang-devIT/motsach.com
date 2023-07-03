<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TableAdmin;
use Faker\Factory as Faker;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        TableAdmin::create([
            'name'=>'Admin',
            'email'=> 'admin@gmail.com',
            'email_verified_at' => null,
            'password' => bcrypt('123456'),
        ]);
    }
}
