<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\News;
use App\User;
use Faker\Factory as FakerFactory;

class InsertNews extends TestCase
{
    /**
     * Tests insert endpoint
     *
     * @return void
     */
    public function testInsert()
    {
        $faker = FakerFactory::create();

        $user = User::findOrFail($faker->randomElement(User::all())->id);
        
        $news = factory(News::class)->make();

        $response = $this->actingAs($user)->put("/insert", $news->toArray());

        $response->assertStatus(200);
    }
}
