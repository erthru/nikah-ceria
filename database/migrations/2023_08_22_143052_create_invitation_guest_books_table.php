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
        Schema::create('invitation_guest_books', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->unsignedBigInteger('guest_id');
            $table->unsignedBigInteger('invitation_id');
            $table->timestamps();
        });

        Schema::table('invitation_guest_books', function (Blueprint $table) {
            $table->foreign('guest_id')->references('id')->on('invitation_guests');
            $table->foreign('invitation_id')->references('id')->on('invitations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitation_guest_books');
    }
};
