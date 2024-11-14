<?php

namespace Database\Seeders;

use App\Models\Channel;
use App\Models\CommunityLink;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::delete('delete from community_links');
        DB::delete('delete from users');
        DB::delete('delete from channels');
        // Users
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@email.com',
            'email_verified_at' => now(),
            'password' => '123456789',
            'remember_token' => Str::random(10),
            'trusted' => 1
        ]);
        User::factory(10)->create();
        // Channels
        Channel::factory()->create([
            'id' => 1,
            'title' => 'React',
            'slug' => 'react',
            'color' => 'red',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Channel::factory()->create([
            'id' => 2,
            'title' => 'JavaScript',
            'slug' => 'js',
            'color' => 'orange',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Channel::factory()->create([
            'id' => 3,
            'title' => 'Laravel',
            'slug' => 'laravel',
            'color' => 'blue',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Channel::factory()->create([
            'id' => 4,
            'title' => 'PHP',
            'slug' => 'php',
            'color' => 'purple',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // Links
        CommunityLink::factory(50)->create();
    }
}
