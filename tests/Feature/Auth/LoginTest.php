<?php

namespace Tests\Feature\Auth;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class LoginTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function testGuestLoginView(): void
    {
        $response = $this->get(route('login'));
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
        $response->assertStatus(200);
    }

    public function testAuthLoginView(): void
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get(route('login'));
        $response->assertRedirect(route('home'));
        $response->assertStatus(302);
    }

    public function testCorrectLogin(): void
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = $this->faker->password),
        ]);
        $response = $this->post(route('login'), [
            'email'    => $user->email,
            'password' => $password,
        ]);
        $response->assertRedirect(route('home'));
    }

    public function testIncorrectLogin(): void
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($this->faker->password),
        ]);

        $response = $this->from(route('login'))->post(route('login'), [
            'email'    => $user->email,
            'password' => $this->faker->password,
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');

        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}
