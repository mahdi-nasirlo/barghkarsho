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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->string("name")->max(128);

            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('service_items')->cascadeOnDelete();

            // ->cascadeOnDelete();
            $table->bigInteger('mobile');
            $table->text("message")->nullable()->max(1500);

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
        Schema::dropIfExists('services');
    }
};
