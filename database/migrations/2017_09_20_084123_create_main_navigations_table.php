<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainNavigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_navigations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('link');
            $table->integer('order')->nullable();
            $table->string('icon')->nullable();
            $table->string('color')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('main_navigation_role', function (Blueprint $table) {
            $table->integer('main_navigation_id')->unsigned()->index();
            $table->foreign('main_navigation_id')->references('id')->on('main_navigations')->onDelete('cascade');
            $table->integer('role_id')->unsigned()->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->primary(['main_navigation_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_navigation_role');
        Schema::dropIfExists('main_navigations');
    }
}
