<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->date('birthDate');
            $table->string('street');
            $table->string('mobile');
            $table->integer('schoolClasses_id')->unsigned();
            $table->integer('cities_id')->unsigned();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('people', function (Blueprint $table) {
            $table->foreign('schoolClasses_id')->references('id')->on('school_classes');
            $table->foreign('cities_id')->references('id')->on('cities');
        });
        DB::statement("ALTER TABLE people ADD profilePicture MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
