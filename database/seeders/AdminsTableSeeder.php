<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TableUser;
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
        TableUser::create([
            'fullname'=>'Admin',
            'email'=> 'admin@gmail.com',
            'phone' => '0327023558',
            'address' => '83 Nguyễn Huệ, Q1',
            'status' => '1',
            'password' => bcrypt('123456'),
        ]);
    }
}
