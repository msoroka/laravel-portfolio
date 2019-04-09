<?php

namespace Tests\Feature\Auth;

use App\User;
use App\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class AdminTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function testAdminAccessWithRights()
    : void
    {
        $user = factory(User::class)->create();
        $user->role = Role::create([
            'slug' => 'admin',
            'name' => $this->faker->word,
        ]);

        $this->actingAs($user)->assertAuthenticated();

        $response = $this->get(route('admin.dashboard'));
        $response->assertStatus(200);
    }

    public function testAdminAccessWithoutRights()
    : void
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)->assertAuthenticated();

        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('home'));
        $response->assertStatus(302);
    }

    public function testAdminAccessLoggedOut()
    : void
    {
        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('login'));
        $response->assertStatus(302);
    }
}
