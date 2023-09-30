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
        Schema::table('invitation_guest_books', function (Blueprint $table) {
            $table->dropForeign(['guest_id']);
            $table->dropColumn('guest_id');
            $table->unsignedBigInteger('invitation_guest_id')->after('message');
        });

        Schema::table('invitation_guest_books', function (Blueprint $table) {
            $table->foreign('invitation_guest_id')->references('id')->on('invitation_guests');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invitation_guest_books', function (Blueprint $table) {
            //
        });
    }
};
