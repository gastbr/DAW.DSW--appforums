<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CommunityLink>
 */
class CommunityLinkFactory extends Factory
{
    protected $fillable = [
        'user_id',
        'channel_id',
        'title',
        'link',
        'approved'
    ];

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::all()->random()->id,
            'channel_id' => 1,
            'title' => $this->faker->sentence,
            'link' => $this->faker->url,
            'approved' => 0
        ];
    }
}
