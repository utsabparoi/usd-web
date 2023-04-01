<?php

namespace Database\Seeders;

use App\Models\Admin\Configuration;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuration::firstOrCreate([
            'project_name' => 'Read USD',
            'email' => 'readusd@gmail.com',
            'phone' => '911234567891',
            'address' => 'Canada',
            'withdraw_charge' => '5%',
            'balance_transfer_charge' => '5%',
            'withdrow_limitation' => '200$',
        ]);
    }
}
