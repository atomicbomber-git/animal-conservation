<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantPermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_permits', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string("species");

            $table->string("parent_name");
            $table->string("parent_certificate_code");
            $table->string("parent_birthplace");
            $table->string("parent_birthdate");
            $table->string("parent_generation");
            $table->string("parent_certificate_image");

            $table->string("proposal_document");
            $table->string("reference_image");

            $table->integer("user_id")->unsigned()->nullable();
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_permits');
    }
}
