<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::factory()->create([
            'max_open_orders' => 5,
            'interval_between_orders' => 90,
            'max_orders_in_interval' => 2,
            'telegram_token' => null
        ]);
    }
}
