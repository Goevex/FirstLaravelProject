<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\News;
use Faker\Factory as FakerFactory;

class UpdateNews extends TestCase
{
    /**
     * Tests remove endpoint
     *
     * @return void
     */
    public function testUpdate()
    {
        $faker = FakerFactory::create();

        $user = User::findOrFail($faker->randomElement(User::all())->id);

        $news = factory(News::class)->make();
        $news_id=News::findOrFail($faker->randomElement(News::all())->id)->id;

        $response = $this->actingAs($user)->patch(route('news.update.one', ['id' => $news_id]), $news->toArray());

        $response->assertStatus(200);
    }
}
