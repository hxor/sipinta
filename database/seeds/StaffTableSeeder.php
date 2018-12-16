<?php

use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
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
                'group_id' => 1,
                'idnumber' => '1234123412341234', 
                'name' => 'Staff', 
                'gender' => 'male', 
                'phone' => '08912341234', 
                'address' => 'Cirebon, Indonesia', 
                'is_leader' => true,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        App\Models\Staff::insert($data);
    }
}
