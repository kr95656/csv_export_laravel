<?php

use Illuminate\Database\Seeder;
use App\Models\Design;

class DesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Design::class)->create([
            'id' => 1,
            'name' => '平屋',
        ]);
        factory(Design::class)->create([
            'id' => 2,
            'name' => '２・３階建て',
        ]);
        factory(Design::class)->create([
            'id' => 3,
            'name' => '～40坪台',
        ]);
        factory(Design::class)->create([
            'id' => 4,
            'name' => '50～60坪台',
        ]);
        factory(Design::class)->create([
            'id' => 5,
            'name' => '70～坪以上',
        ]);
    }
}
