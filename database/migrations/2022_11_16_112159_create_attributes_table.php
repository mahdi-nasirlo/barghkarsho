<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->string('type')->default('string');
            $table->boolean('is_searchable')->default(false);
            $table->json('values')->nullable();

            $table->timestamps();
        });

        Schema::create('attribute_product', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('attributes_id');
            $table->foreign('attributes_id')
                ->references('id')
                ->on('attributes')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('value')->nullable();
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
        Schema::dropIfExists('attribute');
    }
};
