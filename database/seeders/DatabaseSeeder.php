<?php

namespace Database\Seeders;

use App\Models\CommunityLink;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();

        /*         User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */
        DB::delete('delete from community_links');
        CommunityLink::factory(50)->create();
    }
}
