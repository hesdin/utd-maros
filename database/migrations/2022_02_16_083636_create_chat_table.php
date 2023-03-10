<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user');
            $table->foreignId('admin');
            $table->text('pesan');
            $table->enum('pengirim', ['admin', 'user']);
            $table->timestamps();
            $table->foreign('user')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('admin')->references('id')->on('admins')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat');
    }
}
