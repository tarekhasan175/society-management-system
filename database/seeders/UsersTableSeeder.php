<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default password for users
        $defaultPassword = Hash::make('12345678');

        // Users data
        $users = [
            [
                'id' => 1,
                'company_id'        => 1,
                'type'              => 'admin',
                'name'              => 'Mr. Admin',
                'email'             => 'admin@gmail.com',
                'email_verified_at' => now(),
                'phone'             => '123456789',
                'password'          => $defaultPassword,
            ],
            // You can add more users here
            // [
            //     'id' => 2,
            //     'company_id'        => 1,
            //     'type'              => 'user',
            //     'name'              => 'John Doe',
            //     'email'             => 'john.doe@gmail.com',
            //     'email_verified_at' => now(),
            //     'phone'             => '987654321',
            //     'password'          => $defaultPassword,
            // ],
        ];

        foreach ($users as $user) {
            User::firstOrCreate(
                ['id' => $user['id']],
                $user
            );
        }
    }
}
