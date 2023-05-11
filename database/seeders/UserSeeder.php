<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => \Hash::make('password'),
            'role' => 'admin',
            'api_key_real' => 'i6IhPfH4IdONiM9zU5WaZwImLmxPAnHwyIiYv14ISvJVeaoThxWwCTgw82gv4si3',
            'api_sec_real' => 'wtKPUaixBJPscXc1NJc0HQZICHZLqeZ3oWOvxyGtb9CFqCLgIN2W7ziUcGmt1hno',
            'is_working' => true,
            'start_time' => Carbon::now()->format('H:i:s'),
            'finish_time' => Carbon::now()->endOfDay()->format('H:i:s')
        ]);
    }
}
