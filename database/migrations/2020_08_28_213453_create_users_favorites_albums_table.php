<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersFavoritesAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_favorites_albums', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('album_id')->unsigned()->index();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('album_id')
                ->references('id')->on('albums')
                ->onDelete('cascade');
        });

        DB::table('users_favorites_albums')->insert(
            [
                'user_id' => '1',
                'album_id' => '1',
            ]
        );

        DB::table('users_favorites_albums')->insert(
            [
                'user_id' => '1',
                'album_id' => '2',
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
        Schema::dropIfExists('users_favorites_albums');
    }
}
