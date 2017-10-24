<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permits', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string("species");

            $table->string("father_name");
            $table->string("father_certificate_code");
            $table->string("father_birthplace");
            $table->string("father_birthdate");
            $table->string("father_certificate_image");

            $table->string("mother_name");
            $table->string("mother_certificate_code");
            $table->string("mother_birthplace");
            $table->string("mother_birthdate");
            $table->string("mother_certificate_image");

            $table->string("proposal_document");
            $table->string("reference_image");
        });
            $table->integer("user_id")->unsigned()->nullable();
            $table->foreign("user_id")->references("id")->on("users");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permits');
    }
}
