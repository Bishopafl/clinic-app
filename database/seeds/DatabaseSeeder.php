<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         Role::create(['name'=>'doctor']);
//         Role::create(['name'=>'admin']);
//         Role::create(['name'=>'patient']);
        // $this->call(UsersTableSeeder::class);
        User::create([
            'name' => 'John Doe Patient',
            'email' => 'clinic@patient.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
            'gender' => 'non-binary'
        ]);
        User::create([
            'name' => 'John Doe Doctor',
            'email' => 'john_clinic@doctor.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
            'gender' => 'non-binary'
        ]);
        
        User::create([
            'name' => 'Jane Doe Doctor',
            'email' => 'jane_clinic@doctor.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
            'gender' => 'non-binary'
        ]);
        User::create([
            'name' => 'John Doe Admin',
            'email' => 'clinic@admin.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
            'gender' => 'non-binary'
        ]);
    }
}
