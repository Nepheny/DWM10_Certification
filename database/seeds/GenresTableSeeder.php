<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            ['name' => 'Soundtrack'],
            ['name' => 'Funk'],
            ['name' => 'Electronik'],
            ['name' => 'Pop-rap']
        ]);
    }
}
