<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contributions', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('text');
            $table->integer('people_id')->unsigned();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('contributions', function (Blueprint $table) {
            $table->foreign('people_id')->references('id')->on('people');
        });

        DB::statement("ALTER TABLE contributions ADD media MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contributions');
    }
}
