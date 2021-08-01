<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert(
            [
                'name' => 'Sumanto Jombang',
                'photo' => '20210129_181040.jpg',
                'clientMessage' => 'Good Job, Nice Result',
            ],
        );
        DB::table('clients')->insert(
            [
                'name' => 'Mukidi Malang',
                'photo' => 'cv1k.png',
                'clientMessage' => 'Good Job, Nice Result',
            ],
        );
        DB::table('clients')->insert(
            [
                'name' => 'Santoso Kediri',
                'photo' => '20210326_061936.jpg',
                'clientMessage' => 'Good Job, Nice Result',
            ],
        );
    }
}