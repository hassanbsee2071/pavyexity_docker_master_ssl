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
          $this->call(UsersSeeder::class);
          $this->call(RolesSeeder::class);
          $this->call(UsersRolesSeeder::class);
          $this->call(ModuleSeeder::class);
          $this->call(EmailSeeder::class);
          
         $this->call(LogSeeder::class);
    }
}
