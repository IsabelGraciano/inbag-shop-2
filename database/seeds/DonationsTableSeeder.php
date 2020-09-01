<?php

use Illuminate\Database\Seeder;
use App\Donation;

class DonationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Donation::class,10)->create();
    }
}
