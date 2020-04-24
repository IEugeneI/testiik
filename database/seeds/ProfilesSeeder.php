<?php

use Illuminate\Database\Seeder;

class ProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'name' => 'Валера',
            'surname' => 'Валерьевич',
            'lastname' => 'Валерьев',
            'email' => 'valera@gmail.com',
        ]);

        DB::table('profiles')->insert([
            'name' => 'Инокентий',
            'surname' => 'Валерьевич',
            'lastname' => 'Прувин',
            'email' => 'inok@gmail.com',
        ]);

        DB::table('profiles')->insert([
            'name' => 'Александр',
            'surname' => 'Александрович',
            'lastname' => 'Александров',
            'email' => 'alexalexalex@gmail.com',
        ]);
    }
}
