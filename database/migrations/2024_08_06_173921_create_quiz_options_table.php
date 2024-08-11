<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('quiz_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->constrained()->onDelete('cascade');
            $table->string('option');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_options');
    }
}
