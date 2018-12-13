<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Admin', 'email' => 'admin@mail.com', 'username' => 'admin', 'role_id' => 1, 'password' => bcrypt('secret'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'Supervisor', 'email' => 'spvisor@mail.com', 'username' => 'spvisor', 'role_id' => 2, 'password' => bcrypt('secret'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'Finance', 'email' => 'finance@mail.com', 'username' => 'finance', 'role_id' => 3, 'password' => bcrypt('secret'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'Service', 'email' => 'service@mail.com', 'username' => 'service', 'service' => 4, 'password' => bcrypt('secret'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ];

        App\Models\User::insert($users);
    }
}
