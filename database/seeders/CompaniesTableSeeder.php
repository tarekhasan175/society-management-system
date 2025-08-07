<?php

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'id'                => 1,
                'group_id'          => 1,
                'name'              => 'Smart Software Ltd',
                'business_type_id'  => 1,
                'code'              => '01',
                'short_name'        => 'Smart',
                'head_office'       => 'Here is Head office Information',
                'factory'           => 'Here is Factory office Information',
                'contact_name'      => 'Mr. Contact Name',
                'position'          => 'CEO',
                'phone_number'      => '01777777777',
                'tel_number'        => '8831044',
                'fax'               => '01777777777',
                'email'             => 'smartsoftware@gmail.com',
                'day_off'           => 'Friday',
                'country'           => 'Bangladesh',
                'top_text'          => 'From the given facts we know Wen had facsimiled a letter to Jo revoking his offer before Jo received the letter and replied to it.',
                'logo'              => 'default.png',
            ],
        ];

        foreach ($companies as $company) {
            Company::firstOrCreate(['id' => $company['id']], $company);
        }
    }
}
