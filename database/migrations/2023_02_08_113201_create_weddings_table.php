<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeddingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weddings', function (Blueprint $table) {
            $table->string('name_url', 50)->primary();
            $table->string('title', 50);
            $table->text('name_groom');
            $table->text('name_bride');
            $table->text('child_groom');
            $table->text('father_groom');
            $table->text('mother_groom');
            $table->text('child_bride');
            $table->text('father_bride');
            $table->text('mother_bride');
            $table->text('image');
            $table->text('date_count');
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
        Schema::dropIfExists('weddings');
    }
}
