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
        //create table called posts(id,title,describtion,user_id)
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string(column:'title');
            $table->text(column:'description');
            $table->timestamps();
        });
    }

 
};
