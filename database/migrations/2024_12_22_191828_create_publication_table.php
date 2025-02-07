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
        Schema::create('publication', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('categoriepublication_id')->index('fk_publication_categoriepublication1_idx');
            $table->unsignedBigInteger('users_id')->index('fk_publication_users1_idx');
            $table->string('titre')->nullable();
            $table->text('image')->nullable();
            $table->longText('text')->nullable();
            $table->dateTime('date')->nullable();
            $table->dateTime('datemaj')->nullable();
            $table->string('editepar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publication');
    }
};
