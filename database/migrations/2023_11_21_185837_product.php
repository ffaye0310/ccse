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
        //
        Schema::create('product', function (Blueprint $table) {

            $table->integer('id')->unique()->autoIncrement();
            $table->string('name');
            $table->float('price');
            $table->binary('img')->nullable();
            $table->integer('cat_id')->nullable();
            $table->index('cat_id');
            $table->foreign('cat_id')->references('id')->on('category'); 
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
