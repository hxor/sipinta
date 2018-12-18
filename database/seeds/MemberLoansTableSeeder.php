<?php

use Illuminate\Database\Seeder;

class MemberLoansTableSeeder extends Seeder
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
                'invoice' => 'PIN-'. date('Ymd') .'-'. 0001,
                'member_id' => 1, 
                'loan_id' => 1,
                'debt' => 100000, 
                'cost_service' => 20000,
                'credit' => 120000, 
                'cost_office' => 2500, 
                'cost_gift' => 2500, 
                'cost_saving' => 2500,
                'drop' => 92500,
                'payment' => 20000,
                'payment_left' => 120000, 
                'day' => 'Sun',
                'status' => true, 
                'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        App\Models\MemberLoan::insert($data);
    }
}
