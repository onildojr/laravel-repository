<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->year('release_year');
            $table->integer('artist_id')->unsigned()->index();

            $table->foreign('artist_id')
                ->references('id')->on('artists')
                ->onDelete('cascade');
        });

        DB::table('albums')->insert(
            [
                'name' => 'S&M',
                'release_year' => '2010',
                'artist_id' => '1'
            ]
        );

        DB::table('albums')->insert(
            [
                'name' => 'S&M 2',
                'release_year' => '2000',
                'artist_id' => '1'
            ]
        );

        DB::table('albums')->insert(
            [
                'name' => 'Odiosa Natureza Humana',
                'release_year' => '2011',
                'artist_id' => '2'
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
        Schema::dropIfExists('albums');
    }
}
