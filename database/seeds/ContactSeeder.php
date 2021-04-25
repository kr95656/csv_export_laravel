<?php

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Contact::class)->create([
            'id' => 1,
            'condition_id' => 1,
            'design_id' => 1,
            'email' => 'test@mail.com',
            'tel_number' => '090-1234-5678',
            'fax_number' => '1234-4567-7890',
            'zipcode'=> 1600001,
            'pref'=> '東京都',
            'city'=> '新宿区',
            'street'=> '片町',
            'sur_name'=> 'ユーザー',
            'name'=> '１',
            'memo'=> '営業部への伝言',
            'private_memo' => 'マーケティング部のメモ'

        ]);
        factory(Contact::class)->create([
            'id' => 2,
            'condition_id' => 2,
            'design_id' => 2,
            'email' => 'test@mail.com',
            'tel_number' => '090-1234-5678',
            'fax_number' => '1234-4567-7890',
            'zipcode'=> 1600001,
            'pref'=> '東京都',
            'city'=> '新宿区',
            'street'=> '片町',
            'sur_name'=> 'ユーザー',
            'name'=> '２',
            'memo'=> '営業部への伝言',
            'private_memo' => 'マーケティング部のメモ'
        ]);
        factory(Contact::class)->create([
            'id' => 3,
            'condition_id' => 3,
            'design_id' => 3,
            'email' => 'test@mail.com',
            'tel_number' => '090-1234-5678',
            'fax_number' => '1234-4567-7890',
            'zipcode'=> 1600001,
            'pref'=> '東京都',
            'city'=> '新宿区',
            'street'=> '片町',
            'sur_name'=> 'ユーザー',
            'name'=> '３',
            'memo'=> '営業部への伝言',
            'private_memo' => 'マーケティング部のメモ'
        ]);
        factory(Contact::class)->create([
            'id' => 4,
            'condition_id' => 4,
            'design_id' => 4,
            'email' => 'test@mail.com',
            'tel_number' => '090-1234-5678',
            'fax_number' => '1234-4567-7890',
            'zipcode'=> 1600001,
            'pref'=> '東京都',
            'city'=> '新宿区',
            'street'=> '片町',
            'sur_name'=> 'ユーザー',
            'name'=> '４',
            'memo'=> '営業部への伝言',
            'private_memo' => 'マーケティング部のメモ'
        ]);
        factory(Contact::class)->create([
            'id' => 5,
            'condition_id' => 5,
            'design_id' => 5,
            'email' => 'test@mail.com',
            'tel_number' => '090-1234-5678',
            'fax_number' => '1234-4567-7890',
            'zipcode'=> 1600001,
            'pref'=> '東京都',
            'city'=> '新宿区',
            'street'=> '片町',
            'sur_name'=> 'ユーザー',
            'name'=> '５',
            'memo'=> '営業部への伝言',
            'private_memo' => 'マーケティング部のメモ'
        ]);
    }


}
