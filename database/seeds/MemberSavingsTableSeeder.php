<?php

use Illuminate\Database\Seeder;

class MemberSavingsTableSeeder extends Seeder
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
                'member_id' => 1,
                'type' => 'in', 
                'date' => date('Y-m-d'),
                'cash' => 2500, 
                'saldo' => 2500,
                'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        App\Models\MemberSaving::insert($data);
    }
}
