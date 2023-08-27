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
        Schema::create('invitation_gifts', function (Blueprint $table) {
            $table->id();
            $table->string('bank');
            $table->string('account_holder');
            $table->string('account_number');
            $table->unsignedBigInteger('invitation_id');
            $table->timestamps();
        });

        Schema::table('invitation_gifts', function (Blueprint $table) {
            $table->foreign('invitation_id')->references('id')->on('invitations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitation_gifts');
    }
};
