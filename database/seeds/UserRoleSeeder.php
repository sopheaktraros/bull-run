<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //DASHBOARD
        DB::table('user_roles')->insert(
            [
                'name' => 'Developer',
                'created_at' => '2020-10-12 09:13:29',
                'updated_at' => '2020-10-12 09:13:29'
            ] 
        );

        
    }
}
