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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('header');
            $table->string('male_name');
            $table->string('female_name');
            $table->string('male_father_name');
            $table->string('male_mother_name');
            $table->string('female_father_name');
            $table->string('female_mother_name');
            $table->integer('male_family_order');
            $table->integer('female_family_order');
            $table->text('caption_1')->nullable();
            $table->text('caption_2')->nullable();
            $table->text('gallery_1')->nullable();
            $table->text('gallery_2')->nullable();
            $table->text('gallery_3')->nullable();
            $table->text('gallery_4')->nullable();
            $table->text('gallery_5')->nullable();
            $table->text('youtube_url')->nullable();
            $table->text('song')->nullable();
            $table->boolean('is_published');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('customer_id');
            $table->timestamps();
        });

        Schema::table('invitations', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
