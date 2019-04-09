<?php

namespace Tests\Unit\Roles;

use App\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleUnitTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function testRoleCreate(): void
    {
        $data = $this->prepareAssertionData();
        $role = Role::create($data);

        $this->assertInstanceOf(Role::class, $role);
        $this->assertEquals(Arr::get($data, 'name'), $role->name);
        $this->assertEquals(Arr::get($data, 'slug'), $role->slug);
    }

    public function testRoleGet(): void
    {
        $role = factory(Role::class)->create();
        $foundRole = Role::find($role->id);

        $this->assertInstanceOf(Role::class, $foundRole);
        $this->assertEquals($foundRole->name, $role->name);
        $this->assertEquals($foundRole->slug, $role->slug);
    }

    public function testRoleUpdate(): void
    {
        $role = factory(Role::class)->create();
        $data = $this->prepareAssertionData();
        $update = $role->update($data);

        $this->assertTrue($update);
        $this->assertInstanceOf(Role::class, $role);
        $this->assertEquals(Arr::get($data, 'name'), $role->name);
        $this->assertEquals(Arr::get($data, 'slug'), $role->slug);
    }


    public function testRoleDelete(): void
    {
        $role = factory(Role::class)->create();
        $delete = $role->delete();

        $this->assertTrue($delete);
    }

    /**
     * @return array
     */
    private function prepareAssertionData(): array
    {
        $word = $this->faker->word;

        return [
            'name' => $word,
            'slug' => Str::slug($word),
        ];
    }
}
