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

    public function testAdminDashboardAccess(): void
    {
        $user = factory(User::class)->create();
        $role = Role::create([
           'slug' => 'admin',
           'name' => $this->faker->word,
        ]);

        $this->actingAs($user)->assertAuthenticated();
        $this->assertEquals($this->get(route('admin.dashboard'))->status(), 302);

        $user->role = $role;

        $this->assertEquals($this->get(route('admin.dashboard'))->status(), 200);
    }
}
