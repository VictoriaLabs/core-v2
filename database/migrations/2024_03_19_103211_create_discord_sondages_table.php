<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscordSondagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discord_sondages', function (Blueprint $table) {
            $table->id();
            $table->string('task_id');
            $table->foreignId('discord_server_id')->constrained('discord_servers');
            $table->string('channel_id');
            $table->foreignId('user_id')->constrained('users');
            $table->string('title');
            $table->string('color');
            $table->timestamp('creation_date');
            $table->json('choices');
            $table->boolean('is_multiple');
            $table->timestamp('deadline_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discord_sondages');
    }
}
