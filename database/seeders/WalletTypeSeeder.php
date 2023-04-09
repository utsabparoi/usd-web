<?php

namespace Database\Seeders;

use App\Models\Admin\WalletType;
use Illuminate\Database\Seeder;

class WalletTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wallet_types = array(
            array('id' => '1','name' => 'Invest'),
            array('id' => '2','name' => 'Income')
          );

        foreach ($wallet_types as $type){
            WalletType::firstOrCreate(
                [
                    'id'            => $type['id']
                ],
                [
                    'name'          => $type['name'],
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]
            );
        }
    }
}
