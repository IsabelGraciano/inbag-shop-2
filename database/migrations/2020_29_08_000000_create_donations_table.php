/* Isabel Graciano Vasquez */
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     * attributes: id, size, usetime, description, deliveryType, image, created_at, updated_at
     * @return void
     */ 
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->enum('size', ['none','XS','S','M','L','XL','XXL',]);
            $table->text('usetime');
            $table->mediumText('description');
            $table->enum('deliveryType', ['I will send it to you','Pick it at my home']);
            $table->mediumText('image');
            
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('users');
            
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
        Schema::dropIfExists('donations');
    }
}
