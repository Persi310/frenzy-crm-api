<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LeadTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;

    public function test_can_create_lead()
    {
        $user = User::factory()->create();

        $token = $user->createToken('test')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")
            ->postJson('/api/leads', [
                'name' => 'Test Lead',
                'email' => 'test@test.com',
                'phone' => '123',
                'source' => 'facebook'
            ]);

        $response->assertStatus(201);
    }
}
