<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->nullable();
            $table->string('profile_name', 255);
            $table->string('last_name', 255)->nullable();
            $table->string('first_name', 255)->nullable();
            $table->string('profile_address', 255)->nullable();
            $table->string('profile_contact_number', 255)->nullable();
            $table->string('profile_email', 255)->nullable();
            $table->string('department', 255)->nullable();
            $table->string('department_alias', 255)->nullable();
            $table->string('position', 255)->nullable();
            $table->string('profile_image', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
