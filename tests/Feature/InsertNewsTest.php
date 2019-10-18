<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\News;
use App\User;

class InsertNews extends TestCase
{
    use WithFaker;

    /**
     * Tests insert endpoint
     *
     * @return void
     */
    public function testInsert()
    {
        $faker = $this->faker();

        $user = User::findOrFail($faker->randomElement(User::all())->id);

        $news = factory(News::class)->make();

        $response = $this->actingAs($user)->put(route('news.insert.one'), $news->toArray());

        $response->assertStatus(200);
    }
}
