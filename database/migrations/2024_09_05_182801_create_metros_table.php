<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metros', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->nullable();
            $table->string('precio')->nullable();
            $table->string('estado')->nullable();

            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->longText('data')->nullable();
            $table->integer('cant_rifas')->nullable();

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
        Schema::dropIfExists('metros');
    }
};
