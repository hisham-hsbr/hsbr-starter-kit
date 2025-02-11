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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique;
            $table->string('model');
            $table->text('data')->nullable();
            $table->string('default_value');
            $table->string(column: 'value')->nullable();
            $table->string('type')->nullable();
            $table->string('group')->nullable();
            $table->string(column: 'permission')->nullable();
            $table->string('parent')->nullable();
            $table->string('default_by')->nullable();
            $table->string('form_type')->nullable();
            $table->string('form_data')->nullable();

            // default
            $table->string('description')->nullable();
            $table->string('edit_description')->nullable();
            $table->boolean('default')->nullable();
            $table->boolean('status')->nullable();

            $table->unsignedBigInteger('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
