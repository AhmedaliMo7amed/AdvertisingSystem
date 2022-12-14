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
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->foreignId('advertiser_id')->constrained()->onDelete('cascade');;
            $table->foreignId('category_id')->constrained()->onDelete('cascade');;
            $table->enum('type', ['free', 'paid'])->default('free');
            $table->string("title",30);
            $table->longText("description");
            $table->date("start_date");
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
        Schema::dropIfExists('ads');
    }
};
