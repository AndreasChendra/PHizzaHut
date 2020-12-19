<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PizzaSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(TransactionSeeder::class);
    }
}
