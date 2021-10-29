<?php

namespace Database\Seeders;

use App\Models\Beat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // DB::table('beats')->insert([
        //     'title' => Str::random(10),
        //     'path' => Str::random(5) . '.mp3',
        //     'tag1' => '#' . Str::random(5),
        //     'tag2' => '#' . Str::random(5),
        //     'description' => Str::random(20),
        //     'user_id' => 1,
        // ]);

        Beat::factory()
            ->count(50)
            ->create();
    }
}
