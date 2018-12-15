<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title' => 'Group A', 'description' => 'Territorial A']
        ];

        App\Models\Group::insert($data);
    }
}
