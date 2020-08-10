<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('participant_name');
            $table->string('site_id');
            $table->enum('study_id', ['study1', 'study2', 'study3', 'study4', 'study5']);
            $table->integer('country_id');
            $table->enum('country', ['polland', 'russia', 'german', 'uk', 'usa']);
            $table->enum('document', ['uploaded', 'econsent'])->default('econsent');
            $table->string('remark')->nullable();
            $table->enum('quiz_completion', ['complete', 'incomplete'])->default('incomplete');
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
        Schema::dropIfExists('quiz');
    }
}
