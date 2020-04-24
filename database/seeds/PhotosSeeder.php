<?php

use Illuminate\Database\Seeder;

class PhotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert([
            'profile_id' => '1',
            'photo_url' =>'images/1/1.jpg',
        ]);

        DB::table('photos')->insert([
            'profile_id' => '2',
            'photo_url' => 'images/2/2.jpg',
        ]);

        DB::table('photos')->insert([
            'profile_id' => '3',
            'photo_url' => 'images/3/3.png',
        ]);
    }
}
