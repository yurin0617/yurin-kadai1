<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(ChannelsTableSeeder::class);
        $this->call(AdminusersTableSeeder::class);

        $channels = \App\Models\Channel::all();

        // Contactのダミーデータを35件生成
        Contact::factory()->count(35)->create()->each
        (
            function ($contact) use ($channels)
            {
                $contact->channels()->attach
                (
                    $channels->random(rand(1, 2))->pluck('id')->toArray()
                );
            }
        );
    }
}
