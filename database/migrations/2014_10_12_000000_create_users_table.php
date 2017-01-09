<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('rank')->default('1');
            $table->boolean('create')->default(false);
            $table->boolean('edit')->default(false);
        });
        DB::table('users')->insert(
            array(
                'id'=>'1',
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>'$2y$10$LBoV0xGxny9.AAxInwPq1eckdpSfoWcYpjaur7e9Rts6bbPIL66au',
                'rank'=>'0',
                'create'=>true,
                'edit'=>true
            )
        );
         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
