<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            ['name' => 'Hans Zimmer'],
            ['name' => 'Ramin Djawadi'],
            ['name' => 'Daft Punk'],
            ['name' => 'Stromae']
        ]);
    }
}
