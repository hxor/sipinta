<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(StaffTableSeeder::class);
        $this->call(PackageLoansTableSeeder::class);
        $this->call(MembersTableSeeder::class);
        $this->call(MemberLoansTableSeeder::class);
        $this->call(MemberSavingsTableSeeder::class);
        $this->call(PackageDepositsTableSeeder::class);
        $this->call(MemberDepositsTableSeeder::class);
    }
}
