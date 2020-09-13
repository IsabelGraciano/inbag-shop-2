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
        $this->call(DonationsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DonationsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(WishListsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
    }
}
