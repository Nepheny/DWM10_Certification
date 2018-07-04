<?php

use Illuminate\Database\Seeder;

class Albums_GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('album_genre')->insert([
            [
                'album_id' => 1,
                'genre_id' => 1
            ],
            [
                'album_id' => 2,
                'genre_id' => 1
            ],
            [
                'album_id' => 3,
                'genre_id' => 1
            ],
            [
                'album_id' => 4,
                'genre_id' => 2
            ],
            [
                'album_id' => 4,
                'genre_id' => 3
            ],
            [
                'album_id' => 5,
                'genre_id' => 3
            ],
            [
                'album_id' => 5,
                'genre_id' => 4
            ]
        ]);
    }
}
