<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    // Menggunakan trait RefreshDatabase agar setiap melakukan test, database direset
    use RefreshDatabase;
    public function test_user_login(): void
    {
        // TODO: Implement test_user_register() method.
        
        $response = $this->post(route('register'), [
            'name' => 'User',
            'email' => 'user@test.case',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('home-page'));
        $this->assertDatabaseHas('users', [
            'name' => 'User',
            'email' => 'user@test.case',
        ]);
    }

    public function test_user_register(): void
    {
        // Membuat user baru
        $user = User::factory()->create([
            'email' => 'user@test.case',
            'password' => Hash::make('password'),
        ]);

        // Membuat request ke route login
        $response = $this->post(route('login'), [
            'email' => 'user@test.case',
            'password' => 'password',
        ]);

        // Cek apakah user sudah login
        $response->assertRedirect(route('home-page'));
        // Cek apakah user sudah terautentikasi
        $this->assertAuthenticatedAs($user);

    }
}
