<?php

use Illuminate\Database\Seeder;

class PackageLoansTableSeeder extends Seeder
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
                'title' => 'Paket 6 Minggu', 
                'installment' => '6', 
                'cost_service' => '20', 
                'cost_office' => '2.5', 
                'cost_gift' => '2.5', 
                'cost_saving' => '2.5', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Paket 8 Minggu', 
                'installment' => '8', 
                'cost_service' => '20', 
                'cost_office' => '5', 
                'cost_gift' => '2.5', 
                'cost_saving' => '2.5', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Paket 10 Minggu', 
                'installment' => '10', 
                'cost_service' => '30', 
                'cost_office' => '5', 
                'cost_gift' => '2.5', 
                'cost_saving' => '2.5', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        App\Models\PackageLoan::insert($data);
    }
}
