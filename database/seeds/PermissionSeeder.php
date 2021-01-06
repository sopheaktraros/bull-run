<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //PACKAGE & PERMISSION

        DB::table('user_permissions')->insert(
            [
                'name' => 'Product Management',
                'role_id' => 1,
                'group' => 1,
                'order' => 0,
                'route' => '',
                'icon' => 'fas fa-box',
                'enable' => 1,
                'active' => 1,
                'write' => 1,
                'update' => 1,
                'delete' => 1,
                'viewall' => 1
            ] 
        );

        DB::table('user_permissions')->insert(
            [
                'name' => 'Product Category',
                'role_id' => 1,
                'group' => 1,
                'order' => 1,
                'route' => 'product_category',
                'icon' => '',
                'enable' => 1,
                'active' => 1,
                'write' => 1,
                'update' => 1,
                'delete' => 1,
                'viewall' => 1
            ],
        );

        DB::table('user_permissions')->insert(
            [
                'name' => 'Product',
                'role_id' => 1,
                'group' => 1,
                'order' => 2,
                'route' => 'product',
                'icon' => '',
                'enable' => 1,
                'active' => 1,
                'write' => 1,
                'update' => 1,
                'delete' => 1,
                'viewall' => 1
            ],
        );

        DB::table('user_permissions')->insert(
            [
                'name' => 'Loan Management',
                'role_id' => 1,
                'group' => 2,
                'order' => 0,
                'route' => '',
                'icon' => 'fas fa-hand-holding-usd',
                'enable' => 1,
                'active' => 1,
                'write' => 1,
                'update' => 1,
                'delete' => 1,
                'viewall' => 1
            ],
        );

        DB::table('user_permissions')->insert(
            [
                'name' => 'Customer',
                'role_id' => 1,
                'group' => 2,
                'order' => 1,
                'route' => 'customer',
                'icon' => '',
                'enable' => 1,
                'active' => 1,
                'write' => 1,
                'update' => 1,
                'delete' => 1,
                'viewall' => 1
            ],
        );

        DB::table('user_permissions')->insert(
            [
                'name' => 'Loan',
                'role_id' => 1,
                'group' => 2,
                'order' => 2,
                'route' => 'loan',
                'icon' => '',
                'enable' => 1,
                'active' => 1,
                'write' => 1,
                'update' => 1,
                'delete' => 1,
                'viewall' => 1
            ],
        );

        

        DB::table('user_permissions')->insert(
            [
                'name' => 'Re-loan',
                'role_id' => 1,
                'group' => 2,
                'order' => 3,
                'route' => 'reloan',
                'icon' => '',
                'enable' => 1,
                'active' => 1,
                'write' => 1,
                'update' => 1,
                'delete' => 1,
                'viewall' => 1
            ],
        );

        DB::table('user_permissions')->insert(
            [
                'name' => 'Report',
                'role_id' => 1,
                'group' => 3,
                'order' => 0,
                'route' => '',
                'icon' => '',
                'enable' => 1,
                'active' => 1,
                'write' => 1,
                'update' => 1,
                'delete' => 1,
                'viewall' => 1
            ],
        );

        DB::table('user_permissions')->insert(
            [
                'name' => 'Report Loan',
                'role_id' => 1,
                'group' => 3,
                'order' => 2,
                'route' => 'report_loan',
                'icon' => '',
                'enable' => 1,
                'active' => 1,
                'write' => 1,
                'update' => 1,
                'delete' => 1,
                'viewall' => 1
            ],
        );


        DB::table('user_permissions')->insert(
            [
                'name' => 'Configuration',
                'role_id' => 1,
                'group' => 4,
                'order' => 0,
                'route' => '',
                'icon' => 'fas fa-tools',
                'enable' => 1,
                'active' => 1,
                'write' => 1,
                'update' => 1,
                'delete' => 1,
                'viewall' => 1
            ],
        );

        DB::table('user_permissions')->insert(
            [
                'name' => 'General Setting',
                'role_id' => 1,
                'group' => 4,
                'order' => 1,
                'route' => 'general_setting',
                'icon' => '',
                'enable' => 1,
                'active' => 1,
                'write' => 1,
                'update' => 1,
                'delete' => 1,
                'viewall' => 1
            ],
        );

        DB::table('user_permissions')->insert(
            [
                'name' => 'Period',
                'role_id' => 1,
                'group' => 4,
                'order' => 2,
                'route' => 'period',
                'icon' => '',
                'enable' => 1,
                'active' => 1,
                'write' => 1,
                'update' => 1,
                'delete' => 1,
                'viewall' => 1
            ],
        );

        DB::table('user_permissions')->insert(
            [
                'name' => 'Project',
                'role_id' => 1,
                'group' => 4,
                'order' => 3,
                'route' => 'project',
                'icon' => '',
                'enable' => 1,
                'active' => 1,
                'write' => 1,
                'update' => 1,
                'delete' => 1,
                'viewall' => 1
            ],
        );

        DB::table('user_permissions')->insert(
            [
                'name' => 'House Types',
                'role_id' => 1,
                'group' => 4,
                'order' => 4,
                'route' => 'house_types',
                'icon' => '',
                'enable' => 1,
                'active' => 1,
                'write' => 1,
                'update' => 1,
                'delete' => 1,
                'viewall' => 1
            ],
        );

        //

        DB::table('user_permissions')->insert(
            [
                'name' => 'User Management',
                'role_id' => 1,
                'group' => 5,
                'order' => 0,
                'route' => '',
                'icon' => '',
                'enable' => 1,
                'active' => 1,
                'write' => 1,
                'update' => 1,
                'delete' => 1,
                'viewall' => 1
            ],
        );

        DB::table('user_permissions')->insert(
            [
                'name' => 'Staff Info',
                'role_id' => 1,
                'group' => 5,
                'order' => 1,
                'route' => 'staff',
                'icon' => '',
                'enable' => 1,
                'active' => 1,
                'write' => 1,
                'update' => 1,
                'delete' => 1,
                'viewall' => 1
            ],
        );

        DB::table('user_permissions')->insert(
            [
                'name' => 'User Role',
                'role_id' => 1,
                'group' => 5,
                'order' => 2,
                'route' => 'roles',
                'icon' => '',
                'enable' => 1,
                'active' => 1,
                'write' => 1,
                'update' => 1,
                'delete' => 1,
                'viewall' => 1
            ],
        );

        DB::table('user_permissions')->insert(
            [
                'name' => 'Permission',
                'role_id' => 1,
                'group' => 5,
                'order' => 3,
                'route' => 'permission',
                'icon' => '',
                'enable' => 1,
                'active' => 1,
                'write' => 1,
                'update' => 1,
                'delete' => 1,
                'viewall' => 1
            ]
        );
    }
}
