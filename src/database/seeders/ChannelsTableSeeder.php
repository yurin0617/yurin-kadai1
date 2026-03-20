<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create(['content' => '自社サイト']);
        Channel::create(['content' => '検索エンジン']);
        Channel::create(['content' => 'SNS']);
        Channel::create(['content' => 'テレビ・新聞']);
        Channel::create(['content' => '友人・知人']);
    }
}
