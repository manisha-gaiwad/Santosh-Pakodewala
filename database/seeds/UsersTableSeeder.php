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
        
      

      
        DB::table('users')->insert([
            'branch_name' => 'Manewada',
            'name' => 'Admin',
            'username' => 'admin@admin.com',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'

        ]);

    }
}
