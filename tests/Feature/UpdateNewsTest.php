<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\News;

class UpdateNews extends TestCase
{
    use WithFaker;

    /**
     * Tests remove endpoint
     *
     * @return void
     */
    public function testUpdate()
    {
        $faker = $this->faker();

        $user = User::findOrFail($faker->randomElement(User::all())->id);

        $news = factory(News::class)->make();
        $news_id = News::findOrFail($faker->randomElement(News::all())->id)->id;

        $response = $this->actingAs($user)->patch(route('news.update.one', ['id' => $news_id]), $news->toArray());

        $response->assertStatus(200);
    }
}
