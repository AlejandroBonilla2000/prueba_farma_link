<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MedicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medications')->insert([
            [
                'name' => 'Aspirina',
                'description' => 'Analgésico y antipirético.',
                'price' => 10.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ibuprofeno',
                'description' => 'Antiinflamatorio no esteroideo.',
                'price' => 8.75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paracetamol',
                'description' => 'Analgésico y antipirético.',
                'price' => 7.20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Amoxicilina',
                'description' => 'Antibiótico de amplio espectro.',
                'price' => 15.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Loratadina',
                'description' => 'Antihistamínico.',
                'price' => 12.30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
