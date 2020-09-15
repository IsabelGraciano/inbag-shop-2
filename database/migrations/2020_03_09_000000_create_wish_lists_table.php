
<?php
/*Santiago Moreno Rave*/
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishListsTable extends Migration
{
    /**
     * Run the migrations.
     * attributes id, name, description, size, category, color, price, image, created_at, updated_at
     * @return void
     */ 
    public function up()
    {
        Schema::create('wish_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wish_lists');
    }
}
