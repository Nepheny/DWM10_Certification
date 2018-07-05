<?php

use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->insert([
            [
                'title'     => 'The Da Vinci Code',
                'release'   => '2006-05-09',
                'author_id' => 1,
                'cover'     => 'img/220px-Davincicodesoundtrack.jpg',
                'price'     => 15,
                'count'     => 10
            ],
            [
                'title'     => 'Inception',
                'release'   => '2010-07-13',
                'author_id' => 1,
                'cover'     => 'img/220px-Inception_OST.jpg',
                'price'     => 12,
                'count'     => 10
            ],
            [
                'title'     => 'Westworld',
                'release'   => '2016-12-05',
                'author_id' => 2,
                'cover'     => 'img/Westworld_season_1_soundtrack_cover.jpg',
                'price'     => 10,
                'count'     => 10
            ],
            [
                'title'     => 'Random Access Memories',
                'release'   => '2013-05-17',
                'author_id' => 3,
                'cover'     => 'img/daft.jpg',
                'price'     => 14,
                'count'     => 10
            ],
            [
                'title'     => 'Racine carrée',
                'release'   => '2013-08-16',
                'author_id' => 4,
                'cover'     => 'img/stromae.jpg',
                'price'     => 15,
                'count'     => 10
            ]
        ]);
    }
}
