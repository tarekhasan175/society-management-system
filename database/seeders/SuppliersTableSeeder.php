<?php

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;
use Module\GeneralStore\Models\Supplier;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Find the company and user
        $company = Company::find(1);
        $user = User::find(1);

        // Check if the company and user exist
        if ($company && $user) {
            Supplier::firstOrCreate([
                'company_id' => $company->id,
                'created_by' => $user->id,
                'updated_by' => $user->id,
                'name' => 'Supplier 1'
            ]);

            // You can add more suppliers as needed
            // Example:
            Supplier::firstOrCreate([
                'company_id' => $company->id,
                'created_by' => $user->id,
                'updated_by' => $user->id,
                'name' => 'Supplier 2'
            ]);
        } else {
            // Handle the case where company or user does not exist
            if (!$company) {
                echo "Company with ID 1 does not exist.\n";
            }
            if (!$user) {
                echo "User with ID 1 does not exist.\n";
            }
        }
    }
}
