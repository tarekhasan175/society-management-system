<?php

use App\Models\GlobalInfo;
use Illuminate\Database\Seeder;

class GlobalInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $globalInfos = [
            'marital_status'    => ['Single', 'Married'],
            'gender'            => ['Male', 'Female'],
            'employee_type'     => ['Production', 'Regular'],
            'religion'          => ['Muslim', 'Hinduism', 'Christian', 'Buddhism', 'Other'],
            'salary_type'       => ['Monthly Based', 'Hourly Based'],
            'p_bonus_type'      => ['Applicable', 'Not Applicable'],
            'blood_group'       => ['A+', 'B+', 'A-', 'B-', 'O+', 'O-', 'AB+', 'AB-'],
            'employment_status' => ['Permanent', 'Casual', 'Temporary'],
        ];

        foreach ($globalInfos as $key => $values) {
            foreach ($values as $value) {
                GlobalInfo::firstOrCreate(
                    ['key' => $key, 'value' => $value] // Ensuring uniqueness for each key-value pair
                );
            }
        }
    }
}
