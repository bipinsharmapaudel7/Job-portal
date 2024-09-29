<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_page_opens(): void
    {
        $response = $this->get('/');

        $response->assertSeeText('Log in');
        $response->assertStatus(200);
    }

    public function test_page_opens_for_authorized_user(): void
    {
        $user = User::factory(10)->create([
            'password' => 'abc',]);
        dd($user);

        $response = $this->actingAs($user)->get('/');

        $response->assertDontSeeText('Log in');
        $response->assertSeeText('Dashboard');
        $response->assertStatus(200);
    }
}
