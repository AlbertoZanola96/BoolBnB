<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApartmentSlugToClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clicks', function (Blueprint $table) {
            $table->string('apartment_slug')->after('apartment_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clicks', function (Blueprint $table) {
            $table->dropColumn('apartment_slug');
        });
    }
}
