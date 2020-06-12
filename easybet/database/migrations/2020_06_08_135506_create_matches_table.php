<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->foreignId('games_id')->constrained()->onDelete('cascade');
            $table->foreignId('teams_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('teams2_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('teams2_id')->references('id')->on('teams');
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
        Schema::dropIfExists('matches');
    }
}
