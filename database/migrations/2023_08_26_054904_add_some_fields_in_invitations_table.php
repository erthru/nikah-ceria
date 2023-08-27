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
        Schema::table('invitations', function (Blueprint $table) {
            $table->text('male_photo')->after('female_family_order');
            $table->text('female_photo')->after('male_photo');
            $table->text('gallery_6')->after('gallery_5')->nullable();
            $table->text('gallery_7')->after('gallery_6')->nullable();
            $table->text('gallery_8')->after('gallery_7')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            //
        });
    }
};
