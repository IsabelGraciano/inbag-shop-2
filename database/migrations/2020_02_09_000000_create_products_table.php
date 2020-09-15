/* Isabel Graciano Vasquez */
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     * attributes id, name, description, size, discount, category, color, price, image, created_at, updated_at
     * @return void
     */ 
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->enum('size', ['none','XS','S','M','L','XL','XXL']);
            $table->integer('discount');
            $table->mediumText('description');
            $table->enum('category', ['Man','Woman','Kids','Accessories','Shoes']);
            $table->text('color');
            $table->integer('price');
            $table->enum('activated', ['1','0']);
            $table->mediumText('image');
            
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
        Schema::dropIfExists('products');
    }
}
