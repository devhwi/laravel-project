<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sqlite가 아니라면 foreign key check를 해제한다.
        if (config('database.default') !== 'sqlite') {
          DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }

        App\User::truncate();
        $this->call(UsersTableSeeder::class);

        // sqlite가 아니라면 foreign key check를 설정한다.
        if (config('database.default') !== 'sqlite') {
          DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}
