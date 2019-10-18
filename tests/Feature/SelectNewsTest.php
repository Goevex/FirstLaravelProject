<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\News;
use App\User;

class SelectNews extends TestCase
{
    use WithFaker;

    /**
     * Tests show endpoint
     *
     * @return void
     */
    public function testSelect()
    {
        $faker = $this->faker();
     
        $user = User::findOrFail($faker->randomElement(User::all())->id);

        $news=News::findOrFail($faker->randomElement(News::all())->id);

        $response = $this->actingAs($user)->get(route('news.select.one',['id' => $news->id]), $news->toArray());

        $response->assertStatus(200);
    }
}
