<?php

namespace Tests\Unit\Users;

use App\User;
use App\Role;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class UserUnitTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function testUserCreate()
    : void
    {
        $data = $this->prepareAssertionData();
        $user = User::create($data);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals(Arr::get($data, 'first_name'), $user->first_name);
        $this->assertEquals(Arr::get($data, 'last_name'), $user->last_name);
        $this->assertEquals(Arr::get($data, 'email'), $user->email);
        $this->assertEquals(Arr::get($data, 'birth_date'), $user->birth_date->format('Y-m-d'));
        $this->assertInstanceOf(Carbon::class, $user->birth_date);
        $this->assertEquals(Arr::get($data, 'phone'), $user->phone);
        $this->assertEquals(Arr::get($data, 'city'), $user->city);
        $this->assertEquals(Arr::get($data, 'country'), $user->country);
    }


    public function testUserGet()
    : void
    {
        $user = factory(User::class)->create();
        $foundUser = User::find($user->id);

        $this->assertInstanceOf(User::class, $foundUser);
        $this->assertEquals($foundUser->first_name, $user->first_name);
        $this->assertEquals($foundUser->last_name, $user->last_name);
        $this->assertEquals($foundUser->email, $user->email);
        $this->assertEquals($foundUser->birth_date->format('Y-m-d'), $user->birth_date->format('Y-m-d'));
        $this->assertInstanceOf(Carbon::class, $foundUser->birth_date);
        $this->assertEquals($foundUser->phone, $user->phone);
        $this->assertEquals($foundUser->city, $user->city);
        $this->assertEquals($foundUser->country, $user->country);
    }

    public function testUserUpdate()
    : void
    {
        $user = factory(User::class)->create();
        $data = $this->prepareAssertionData();
        $update = $user->update($data);

        $this->assertTrue($update);
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals(Arr::get($data, 'first_name'), $user->first_name);
        $this->assertEquals(Arr::get($data, 'last_name'), $user->last_name);
        $this->assertEquals(Arr::get($data, 'email'), $user->email);
        $this->assertEquals(Arr::get($data, 'birth_date'), $user->birth_date->format('Y-m-d'));
        $this->assertInstanceOf(Carbon::class, $user->birth_date);
        $this->assertEquals(Arr::get($data, 'phone'), $user->phone);
        $this->assertEquals(Arr::get($data, 'city'), $user->city);
        $this->assertEquals(Arr::get($data, 'country'), $user->country);
    }

    public function testUserDelete()
    : void
    {
        $user = factory(User::class)->create();
        $delete = $user->delete();

        $this->assertTrue($delete);
    }

    public function testUserRole()
    : void
    {
        $user = factory(User::class)->create();
        $role = factory(Role::class)->create();

        $user->update([
            'role_id' => $role->id,
        ]);

        $this->assertInstanceOf(Role::class, $user->role);
        $this->assertEquals($user->role->name, $role->name);
        $this->assertEquals($user->role->slug, $role->slug);
    }

    /**
     * @return array
     */
    private function prepareAssertionData()
    : array
    {
        return [
            'first_name' => $this->faker->firstNameMale,
            'last_name'  => $this->faker->lastName,
            'email'      => $this->faker->email,
            'password'   => $this->faker->password,
            'birth_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'phone'      => $this->faker->e164PhoneNumber,
            'city'       => $this->faker->city,
            'country'    => $this->faker->country,
        ];
    }
}
