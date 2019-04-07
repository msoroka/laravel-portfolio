<?php

namespace Tests\Feature\Auth;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class LoginTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * @test
     */
    public function testGuestLoginView()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /**
     * @test
     */
    public function testAuthLoginView()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect(route('home'));
    }

    /**
     * @test
     */
    public function testCorrectLogin()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = $this->faker->password),
        ]);
        $response = $this->post('/login', [
            'email'    => $user->email,
            'password' => $password,
        ]);
        $response->assertRedirect(route('home'));
    }

    /**
     * @test
     */
    public function testIncorrectLogin()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($this->faker->password),
        ]);

        $response = $this->from('/login')->post('/login', [
            'email'    => $user->email,
            'password' => $this->faker->password,
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');

        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}
