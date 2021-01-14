<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ash_user')->insert([
            'id' => 'ash2',
            'passwd' => 'luna1',
            'name' => '김지선',
            'phone' => '01012345678',
            'addr' => '제주도 제주시 노형동',
            'gender' => '여자',
            'email' => 'ash@gmail.com',
            'state' => '활동'
        ]);
    }
}
