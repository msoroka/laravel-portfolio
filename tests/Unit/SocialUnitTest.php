<?php

namespace Tests\Unit;

use App\Social;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Arr;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SocialUnitTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function setUp()
    : void
    {
        parent::setUp();

        Storage::fake('images');
    }

    public function testSocialCreate()
    : void
    {
        $data = $this->prepareAssertionData();
        $social = Social::create($data);

        $this->assertInstanceOf(Social::class, $social);
        $this->assertEquals(Arr::get($data, 'name'), $social->name);
        $this->assertEquals(Arr::get($data, 'link'), $social->link);
        $this->assertInstanceOf(File::class, $social->logo);
        $this->assertEquals(Arr::get($data, 'logo'), $social->logo);
    }

    public function testSocialGet()
    : void
    {
        $social = factory(Social::class)->create();
        $foundSocial = Social::find($social->id);

        $this->assertInstanceOf(Social::class, $foundSocial);
        $this->assertEquals($foundSocial->name, $social->name);
        $this->assertEquals($foundSocial->link, $social->link);
        $this->assertInstanceOf(File::class, $social->logo);
        $this->assertEquals($foundSocial->logo, $social->logo);
    }

    public function testSocialUpdate()
    : void
    {
        $social = factory(Social::class)->create();
        $data = $this->prepareAssertionData();
        $update = $social->update($data);

        $this->assertTrue($update);
        $this->assertInstanceOf(Social::class, $social);
        $this->assertEquals(Arr::get($data, 'name'), $social->name);
        $this->assertEquals(Arr::get($data, 'link'), $social->link);
        $this->assertInstanceOf(File::class, $social->logo);
        $this->assertEquals(Arr::get($data, 'logo'), $social->logo);
    }


    public function testSocialDelete()
    : void
    {
        $social = factory(Social::class)->create();
        $delete = $social->delete();

        $this->assertTrue($delete);
    }

    /**
     * @return array
     */
    private function prepareAssertionData()
    : array
    {
        return [
            'name' => $this->faker->word,
            'link' => $this->faker->url,
            'logo' => UploadedFile::fake()->image('random.jpg'),
        ];
    }
}
