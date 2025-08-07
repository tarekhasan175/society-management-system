<?php

use App\Models\SystemSetting;
use Illuminate\Database\Seeder;

class SystemSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getSystemSettingData() as $setting) {
            SystemSetting::firstOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value'] === NULL ? null : $setting['value']]
            );
        }
    }

    private function getSystemSettingData()
    {
        return [
            ['key' => 'general_store_reference_no_change', 'value' => NULL],
            ['key' => 'out_work_date_picker',             'value' => '0'],
            ['key' => 'employee_summary_gross_salary_get', 'value' => '0'],
            ['key' => 'finger_id_get',                      'value' => '0'],
            ['key' => 'employee_list_card_no',              'value' => '1'],
            ['key' => 'custom_employee_full_id',            'value' => '0'],
            ['key' => 'employee_login_option',              'value' => '0'],
            ['key' => 'employee_attendance_chart',          'value' => '1'],
            ['key' => 'dashboard',                          'value' => '0'],
            ['key' => 'line',                               'value' => '1'],
            ['key' => 'employee_signature',                 'value' => '1'],
            ['key' => 'topbar_background_color',            'value' => '#dfe2cd'],
            ['key' => 'topbar_text_color',                  'value' => 'white'],
            ['key' => 'employee_general_shift',             'value' => '0'],
            ['key' => 'leave_recommender_required',         'value' => '1'],
        ];
    }
}
