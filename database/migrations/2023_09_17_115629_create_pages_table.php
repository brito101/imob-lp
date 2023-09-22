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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('logo_header')->nullable();
            $table->string('logo_footer')->nullable();
            $table->longText('hero_text')->nullable();
            $table->longText('benefits_text')->nullable();
            $table->longText('benefits_video')->nullable();
            $table->longText('features')->nullable();
            $table->boolean('two_rooms')->default(0);
            $table->boolean('three_rooms')->default(0);
            $table->boolean('court')->default(0);
            $table->boolean('pool')->default(0);
            $table->boolean('childreen_pool')->default(0);
            $table->boolean('playground')->default(0);
            $table->boolean('party_room')->default(0);
            $table->boolean('gourmet')->default(0);
            $table->boolean('security')->default(0);
            $table->boolean('green_area')->default(0);
            $table->boolean('commerce')->default(0);
            $table->longText('map')->nullable();
            $table->longText('conditions')->nullable();
            $table->longText('tour')->nullable();
            $table->longText('link_tour')->nullable();
            $table->longText('progress')->nullable();
            $table->integer('installations')->default(0);
            $table->integer('foundation')->default(0);
            $table->integer('structure')->default(0);
            $table->integer('front')->default(0);
            $table->integer('finishing')->default(0);
            $table->string('headline')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->longText('pixel_header')->nullable();
            $table->longText('pixel_body')->nullable();
            $table->text('keywords')->nullable();
            $table->foreignId('user_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
