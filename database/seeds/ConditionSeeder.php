<?php

use Illuminate\Database\Seeder;
use App\Models\Condition;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Condition::class)->create([
            'id' => 1,
            'name' => 'モダン',
        ]);
        factory(Condition::class)->create([
            'id' => 2,
            'name' => 'エレガント',
        ]);
        factory(Condition::class)->create([
            'id' => 3,
            'name' => 'ウッディ',
        ]);
        factory(Condition::class)->create([
            'id' => 4,
            'name' => 'クラシック',
        ]);
        factory(Condition::class)->create([
            'id' => 5,
            'name' => '和風',
        ]);
    }
}
