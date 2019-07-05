<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNamePeopleIdToUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->renameColumn('people_id', 'user_id');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('people_id', 'user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->renameColumn('user_id', 'people_id');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('user_id', 'people_id');
        });
    }
}
