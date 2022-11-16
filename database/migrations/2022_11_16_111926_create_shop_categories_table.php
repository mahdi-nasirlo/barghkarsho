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
        Schema::create('shop_categories', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string('slug');
            $table->text("desc")->nullable();
            $table->boolean("is_visible")->nullable()->default(0);
            $table->string("icon")->nullable();
            $table->text("shortInfo")->nullable()->nullable();
            $table->enum("type", ['api', 'web', 'blog'])->default('web');
            $table->string("cover")->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('level')->default(0);
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
        Schema::dropIfExists('shop_categories');
    }
};
