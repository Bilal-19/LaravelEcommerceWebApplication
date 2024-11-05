<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('product_quantity')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');

            // foreign key reference
            $table
                ->foreign('user_id')->
                references('id')->
                on('users')->
                onDelete('cascade');
            $table
                ->foreign('product_id')->  //name of foreign key
                references('id')->      //name of primary key
                on('products')->             //table name of primary key column
                onUpdate('cascade');     //Data update on both table at the same time
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
