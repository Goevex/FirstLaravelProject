<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\News;
use App\User;
use Faker\Factory as FakerFactory;

class DeleteNews extends TestCase
{
    
    /**
     * Tests delete endpoint
     *
     * @return void
     */
    public function testDelete()
    {
        $faker = FakerFactory::create();

        $user = User::findOrFail($faker->randomElement(User::all())->id);
        
        $response = $this->actingAs($user)->delete(route('news.delete.one', ['id' => $faker->randomElement(News::all())->id]),[]);

        $response->assertStatus(200);
    }
}
