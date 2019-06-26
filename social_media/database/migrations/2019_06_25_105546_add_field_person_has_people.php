<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldPersonHasPeople extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('person_has_people', function (Blueprint $table) {
		    $table->boolean('friendAccepted');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('person_has_people', function (Blueprint $table) {
		    $table->dropColumn('friendAccepted');
	    });
    }
}
