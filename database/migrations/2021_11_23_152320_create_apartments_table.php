<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->tinyInteger('num_rooms');
            $table->tinyInteger('num_beds');
            $table->tinyInteger('num_bathrooms')->nullable();
            $table->smallInteger('square_meters')->nullable();
            $table->string('address');
            $table->string('lat');
            $table->string('lon');
            $table->boolean('visible')->default(true);
            $table->boolean('sponsored')->default(false);
            $table->boolean('slug')->unique();
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
        Schema::dropIfExists('apartments');
    }
}
