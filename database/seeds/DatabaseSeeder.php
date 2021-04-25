<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(ConditionSeeder::class);
        $this->call(DesignSeeder::class);
    }
}

// php artisan db:seed
// 下記のエラー
// Target class [ContactSeeder] does not exist.
// これは、クラス名を急に変えたときなどにおこる。
// 特に、tableをartisanで作って後からスペルミスなどでクラス名を変えたときにでる。

// composer dump-autoload
// で対処

// https://nextat.co.jp/staff/archives/121
