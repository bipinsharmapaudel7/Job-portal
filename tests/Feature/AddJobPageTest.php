<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AddJobPageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_form_does_not_opens_for_normal_authorized_user(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/add-job');

        $response->assertRedirect('/dashboard');
    }

    public function test_form_opens_for_company_authorized_user(): void
    {
        $user = User::factory()->create(['role'=>2]);

        $response = $this->actingAs($user)->get('/add-job');

        $response->assertSeeText('Add a new job');
        $response->assertStatus(200);
    }

    public function test_form_does_not_open_for_guest()
    {
        $response = $this->get('/add-job');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_form_submits_for_valid_data()
    {
        $user = User::factory()->create(['role'=>2]);
        $data = [
            'category' =>'' ,
            'title' =>'' ,
            'type' =>'' ,
            'salary' =>'' ,
            'deadline' => '123',
            'description' =>'' ,
            'photo' =>'' ,
        ];

        $response = $this->post('/add-job', $data);

        $response->assertRedirect('/dashboard');
        $response->assertSeeText('Job created successfully');
    }
}
