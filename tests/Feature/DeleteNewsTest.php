<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\News;
use App\User;

class DeleteNews extends TestCase
{
    use WithFaker;

    /**
     * Tests delete endpoint
     *
     * @return void
     */
    public function testDelete()
    {
        $faker = $this->faker();

        $user = User::findOrFail($faker->randomElement(User::all())->id);

        $response = $this->actingAs($user)->delete(route('news.delete.one', ['id' => $faker->randomElement(News::all())->id]), []);

        $response->assertStatus(200);
    }
}
