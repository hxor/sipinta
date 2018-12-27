<?php

use Illuminate\Database\Seeder;

class PackageDepositsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Tabungan Harian',
                'period' => 312, 
                'profit' => 15, 
                'minimum' => 10000.00, 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s')
            ], [
                'title' => 'Tabungan Mingguan', 
                'period' => 48, 
                'profit' => 15, 
                'minimum' => 20000.00, 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s')
            ], [
                'title' => 'Tabungan Bulanan', 
                'period' => 12, 
                'profit' => 15, 
                'minimum' => 100000.00, 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s')
            ], [
                'title' => 'Simpanan Non-Saham', 
                'period' => 1, 
                'profit' => 20, 
                'minimum' => 5000000.00, 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        App\Models\PackageDeposit::insert($data);
    }
}
