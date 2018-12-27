<?php

use Illuminate\Database\Seeder;

class MemberDepositsTableSeeder extends Seeder
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
                'invoice' => 'TAB-'. date('Ymd') .'-'. 0001,
                'member_id' => 1, 
                'deposit_id' => 1,
                'cash' => 10000, 
                'profit' => 468000,
                'status' => true, 
                'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        App\Models\MemberDeposit::insert($data);
    }
}
