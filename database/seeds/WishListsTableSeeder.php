<?php
/*Santiago Moreno Rave */
use Illuminate\Database\Seeder;
use App\WishList;

class WishListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(WishList::class,10)->create();
    }
}
