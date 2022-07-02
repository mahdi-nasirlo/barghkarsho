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
        Schema::create('common_questions', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('sort')->default(0);

            $table->unsignedBigInteger("course_id");
            $table->foreign("course_id")->on("courses")->references("id")->cascadeOnDelete();

            $table->text("question");
            $table->text("answer");


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
        Schema::dropIfExists('common_questions');
    }
};
