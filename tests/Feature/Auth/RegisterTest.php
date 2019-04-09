<?php

namespace Tests\Feature\Auth;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class RegisterTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function testRegisterLoginView()
    : void
    {
        $response = $this->get(route('register'));
        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
        $response->assertStatus(200);
    }

    public function testAuthRegisterView()
    : void
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get(route('register'));
        $response->assertRedirect(route('home'));
        $response->assertStatus(302);

    }

    public function testCorrectRegister()
    : void
    {
        $data = $this->prepareAssertionData();

        $response = $this->post(route('register'), $data);
        $response->assertRedirect(route('home'));
        $response->assertStatus(302);
    }

    /**
     * @return array
     */
    private function prepareAssertionData()
    : array
    {
        $password = $this->faker->password;

        return [
            'first_name'            => $this->faker->firstNameMale,
            'last_name'             => $this->faker->lastName,
            'email'                 => $this->faker->email,
            'password'              => $password,
            'password_confirmation' => $password,
            'birth_date'            => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'phone'                 => $this->faker->e164PhoneNumber,
            'city'                  => $this->faker->city,
            'country'               => $this->faker->country,
            '_token'                => csrf_token(),
        ];
    }
}
