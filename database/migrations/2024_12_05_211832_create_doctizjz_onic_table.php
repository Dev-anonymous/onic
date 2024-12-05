<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('airesante', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('zonesante_id')->index('fk_airesante_zonesante1_idx');
            $table->string('airesante')->nullable();
        });

        Schema::create('appconfig', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('email')->nullable();
            $table->string('tel')->nullable();
            $table->string('adresse')->nullable();
            $table->string('description')->nullable();
            $table->string('logo')->nullable();
        });

        Schema::create('baniere', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('titre')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
        });

        Schema::create('config', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('config')->nullable();
        });

        Schema::create('contact', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nom')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('sujet')->nullable();
            $table->text('message')->nullable();
            $table->dateTime('date')->nullable();
        });

        Schema::create('paiement', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedBigInteger('users_id')->index('fk_paiement_users1_idx');
            $table->string('description')->nullable();
            $table->double('montant')->nullable();
            $table->enum('devise', ['CDF', 'USD'])->nullable();
            $table->dateTime('date')->nullable();
        });


        Schema::create('pay', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ref')->nullable()->unique('ref_UNIQUE');
            $table->string('myref')->nullable()->unique('myref_UNIQUE');
            $table->tinyInteger('failed')->nullable()->default(0);
            $table->tinyInteger('saved')->nullable()->default(0);
            $table->text('data')->nullable();
            $table->dateTime('date')->nullable();
        });


        Schema::create('profil', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('structuresante_id')->nullable()->index('fk_profil_structuresante1_idx');
            $table->unsignedBigInteger('users_id')->index('fk_profil_users1_idx');
            $table->date('datenaissance')->nullable();
            $table->string('niveauetude')->nullable();
            $table->enum('genre', ['M', 'F'])->nullable();
            $table->string('numeroordre')->nullable();
            $table->string('adresse')->nullable();
            $table->text('fichier')->nullable();
            $table->string('etatcivil')->nullable();
            $table->string('typestructure')->nullable();
        });

        Schema::create('structuresante', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('airesante_id')->index('fk_structuresante_airesante1_idx');
            $table->string('structure')->nullable();
            $table->string('adresse')->nullable();
            $table->string('contact')->nullable();
        });

        Schema::create('transaction', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('paiement_id')->index('fk_transaction_paiement1_idx');
            $table->unsignedBigInteger('users_id')->index('fk_transaction_users1_idx');
            $table->double('montant')->nullable();
            $table->enum('devise', ['CDF', 'USD'])->nullable();
            $table->dateTime('date')->nullable();
            $table->text('ref')->nullable()->unique('ref_UNIQUE');
        });

        Schema::table('users', function ($table) {
            $table->unsignedBigInteger('users_id')->nullable()->index('fk_users_users1_idx');
            $table->enum('user_role', ['admin', 'nurse', 'user'])->default('user');
            $table->string('phone')->nullable()->unique('phone_UNIQUE');
            $table->string('image')->nullable();
            $table->tinyInteger('active')->nullable()->default(1);
        });

        Schema::create('zonesante', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('zonesante')->nullable();
        });

        Schema::table('airesante', function (Blueprint $table) {
            $table->foreign(['zonesante_id'], 'fk_airesante_zonesante1')->references(['id'])->on('zonesante')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('paiement', function (Blueprint $table) {
            $table->foreign(['users_id'], 'fk_paiement_users1')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('profil', function (Blueprint $table) {
            $table->foreign(['structuresante_id'], 'fk_profil_structuresante1')->references(['id'])->on('structuresante')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['users_id'], 'fk_profil_users1')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('structuresante', function (Blueprint $table) {
            $table->foreign(['airesante_id'], 'fk_structuresante_airesante1')->references(['id'])->on('airesante')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('transaction', function (Blueprint $table) {
            $table->foreign(['paiement_id'], 'fk_transaction_paiement1')->references(['id'])->on('paiement')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['users_id'], 'fk_transaction_users1')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign(['users_id'], 'fk_users_users1')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('fk_users_users1');
        });

        Schema::table('transaction', function (Blueprint $table) {
            $table->dropForeign('fk_transaction_paiement1');
            $table->dropForeign('fk_transaction_users1');
        });

        Schema::table('structuresante', function (Blueprint $table) {
            $table->dropForeign('fk_structuresante_airesante1');
        });

        Schema::table('profil', function (Blueprint $table) {
            $table->dropForeign('fk_profil_structuresante1');
            $table->dropForeign('fk_profil_users1');
        });

        Schema::table('paiement', function (Blueprint $table) {
            $table->dropForeign('fk_paiement_users1');
        });

        Schema::table('airesante', function (Blueprint $table) {
            $table->dropForeign('fk_airesante_zonesante1');
        });

        Schema::dropIfExists('zonesante');

        Schema::dropIfExists('users');

        Schema::dropIfExists('transaction');

        Schema::dropIfExists('structuresante');

        Schema::dropIfExists('profil');

        Schema::dropIfExists('personal_access_tokens');

        Schema::dropIfExists('pay');

        Schema::dropIfExists('password_resets');

        Schema::dropIfExists('paiement');

        Schema::dropIfExists('contact');

        Schema::dropIfExists('config');

        Schema::dropIfExists('baniere');

        Schema::dropIfExists('appconfig');

        Schema::dropIfExists('airesante');
    }
};
