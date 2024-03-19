<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('oauths', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("oauth_service_id");
            $table->string("access_token");
            $table->string("token_type");
            $table->timestamp("expire_at");
            $table->text("refresh_token");
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('oauth_service_id')->references('id')->on('oauth_services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oauths');
    }
};
