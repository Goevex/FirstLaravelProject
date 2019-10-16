<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\News;
use App\User;
use Faker\Factory as FakerFactory;

class SelectNews extends TestCase
{

    /**
     * Tests show endpoint
     *
     * @return void
     */
    public function testSelect()
    {
        $faker = FakerFactory::create();
     
        $user = User::findOrFail($faker->randomElement(User::all())->id);

        $news=News::findOrFail($faker->randomElement(News::all())->id);

        $response = $this->actingAs($user)->get('/show/'.$news->id, $news->toArray());

        $response->assertStatus(200);
    }
}
