<?php

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('roles');

        $roles = [['name' => 'Super User'], ['name' => 'Admin User'],['name' => 'User']];

        DB::table('roles')->insert($roles);

        $this->enableForeignKeys();
    }
}