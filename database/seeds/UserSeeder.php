<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

   
        DB::table('users')->insert(
            [ 
                'role_id' => 1,
                'name' => 'Developer',
                'gender' => 'Male',
                'phone_number' => '096 982 2229',
                'username' => 'admin',
                'password' => '$2y$10$Gf5XMm8EYkBLV2BagPmphurIEmYDyuB1Ld4bkRnDYHq/cqku2TsjC',
                'status' => 1,
                'deleted' => 0,
                'created_at' => '2020-10-12 09:13:29',
                'updated_at' => '2020-10-12 09:13:29'
            ] 
        );

        
    }
}
