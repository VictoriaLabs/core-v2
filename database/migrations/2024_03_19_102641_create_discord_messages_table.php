<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscordMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discord_messages', function (Blueprint $table) {
            $table->id();
            $table->string('task_id');
            $table->foreignId('discord_server_id')->constrained('discord_servers');
            $table->string('channel_id');
            $table->foreignId('user_id')->constrained('users');
            $table->longText('message');
            $table->json('datas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discord_messages');
    }
}
