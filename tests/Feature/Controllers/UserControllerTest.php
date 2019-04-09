<?php

namespace Tests\Feature\Controllers;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * @var User
     */
    protected $user;

    public function setUp()
    : void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->user->role = Role::create([
            'slug' => 'admin',
            'name' => $this->faker->word,
        ]);
        $this->actingAs($this->user)->assertAuthenticated();
    }

    public function testIndex()
    : void
    {
        $response = $this->get(route('admin.users.index'));
        $response->assertSuccessful();
        $response->assertViewIs('admin.users.index');
        $response->assertStatus(200);
    }

    public function testCreate()
    : void
    {
        $response = $this->get(route('admin.users.create'));
        $response->assertSuccessful();
        $response->assertViewIs('admin.users.create');
        $response->assertStatus(200);
    }

    //    public function testStore()
    //    : void
    //    {
    //        $response = $this->post(route('admin.users.store'), $this->prepareAssertionData());
    //        $response->assertRedirect(route('admin.users.index'));
    //        $response->assertStatus(302);
    //    }

    //    public function testEdit()
    //    : void
    //    {
    //        $user = factory(User::class)->create();
    //
    //        $response = $this->get(route('admin.users.edit', $user));
    //        $response->assertSuccessful();
    //        $response->assertViewIs('admin.users.edit');
    //        $response->assertStatus(200);
    //    }

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
            'role_id'               => $this->user->role->id,
            '_token'                => csrf_token(),
        ];
    }
}
