<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('user_informations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id');

            $table->string('fullname')->nullable()->default(null);
            $table->string('phone_number')->nullable()->default(null);
            $table->string('university')->nullable()->default(null);
            $table->string('graduated_year')->nullable()->default(null);
            $table->string('major')->nullable()->default(null);
            $table->string('major2')->nullable()->default(null);
            $table->string('cv_id')->nullable()->default(null);
            $table->string('personality')->nullable()->default(null);

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
        \Schema::drop('user_informations');
    }
}
