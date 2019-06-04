<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonHasPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_has_people', function (Blueprint $table) {
            $table->integer('person1')->unsigned();
            $table->integer('person2')->unsigned();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

	    Schema::table('person_has_people', function (Blueprint $table) {
		    $table->foreign('person1')->references('id')->on('people');
		    $table->foreign('person2')->references('id')->on('people');
	    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_has_people');
    }
}
