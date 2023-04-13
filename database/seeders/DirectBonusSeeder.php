<?php

namespace Database\Seeders;

use App\Models\Admin\DirectBonus;
use Illuminate\Database\Seeder;

class DirectBonusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $direct_bonuses = array(
            array('id' => '1', 'generation' => 'G1', 'percentage' => '5.000000', 'status' => '1'),
            array('id' => '2', 'generation' => 'G2', 'percentage' => '1.000000', 'status' => '1'),
            array('id' => '3', 'generation' => 'G3', 'percentage' => '0.500000', 'status' => '1'),
            array('id' => '4', 'generation' => 'G4', 'percentage' => '0.250000', 'status' => '1'),
            array('id' => '5', 'generation' => 'G5', 'percentage' => '0.100000', 'status' => '1'),
            array('id' => '6', 'generation' => 'G6', 'percentage' => '0.100000', 'status' => '1'),
            array('id' => '7', 'generation' => 'G7', 'percentage' => '0.100000', 'status' => '1'),
            array('id' => '8', 'generation' => 'G8', 'percentage' => '0.100000', 'status' => '1'),
            array('id' => '9', 'generation' => 'G9', 'percentage' => '0.100000', 'status' => '1'),
            array('id' => '10', 'generation' => 'G10', 'percentage' => '0.100000', 'status' => '1')
        );

        foreach ($direct_bonuses as $genartion){
            DirectBonus::firstOrCreate(
                [
                    'id'            => $genartion['id']
                ],
                [
                    'generation'    => $genartion['generation'],
                    'percentage'    => $genartion['percentage'],
                    'status'        => $genartion['status'],
                ]
            );
        }
    }
}
