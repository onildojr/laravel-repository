<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name', 150)->index();
            $table->date('birth');
            $table->enum('gender', ['M', 'F'])->index();
            $table->string('username', 50)->index();
            $table->string('password', 100);
        });

        DB::table('users')->insert(
            [
                'name' => 'Onildo Junior',
                'birth' => '1992-10-22',
                'gender' => 'M',
                'username' => 'onildojr',
                'password' => '123456'
            ]
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
