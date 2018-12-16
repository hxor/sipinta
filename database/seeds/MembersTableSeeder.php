<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
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
                'staff_id' => 1, 
                'idnumber' => '9582123412341234', 
                'name' => 'Member', 
                'gender' => 'male',
                'phone' => '0812312341234', 
                'address' => 'Blok X, Rt/Rw 01/02', 
                'village' => 'Desa', 
                'subdistrict' => 'Kecamatan', 
                'city' => 'Kota', 
                'province' => 'Provinsi', 
                'zipcode' => '12341',
                'status' => true, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        App\Models\Member::insert($data);
    }
}
