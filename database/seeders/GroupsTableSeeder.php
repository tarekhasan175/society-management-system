<?php

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define an array of groups to seed
        $groups = [
            [
                'id'        => 1,
                'name'      => 'Smart Software Ltd Group',
                'email'     => 'pacific_group@gmail.com',
                'phone'     => '01777777777',
                'address'   => 'Dhaka, Bangladesh',
                'logo'      => 'default.png',
            ],
            // You can add more groups here
            [
                'id'        => 2,
                'name'      => 'Tech Innovations Inc',
                'email'     => 'tech_innovations@gmail.com',
                'phone'     => '01888888888',
                'address'   => 'Chittagong, Bangladesh',
                'logo'      => 'tech_logo.png',
            ],
            // Add more groups as needed
        ];

        // Loop through the groups array and seed each group
        foreach ($groups as $group) {
            Group::firstOrCreate(
                ['id' => $group['id']],
                [
                    'name'    => $group['name'],
                    'email'   => $group['email'],
                    'phone'   => $group['phone'],
                    'address' => $group['address'],
                    'logo'    => $group['logo'],
                ]
            );
        }
    }
}
