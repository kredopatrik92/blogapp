<?php

namespace Tests\Feature\Livewire\Pages\Blog;

use App\Livewire\Pages\Blog\BlogDetails;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;
use Tests\TestCase;

class BlogDetailsTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_post_detail(): void
    {
        $user = User::factory()->create();
        $image = UploadedFile::fake()->create('test.jpg');
        $post = Blog::create([
            'user_id' => $user->id,
            'title' => 'Created by tester',
            'image' => $image,
            'description' => 'This is sample description'
        ]);

        Livewire::actingAs($user)
            ->test(BlogDetails::class, ['post' => $post ])
            ->assertStatus(200);
    }

    public function test_mark_as_viewed_page(): void
    {
        $user = User::factory()->create();
        $image = UploadedFile::fake()->create('test.jpg');

        $post = Blog::create([
            'user_id' => $user->id,
            'title' => 'Created by tester',
            'image' => $image,
            'description' => 'This is sample description'
        ]);

        $this->assertEquals(0, $post->views()->count());

        Livewire::actingAs($user)
            ->test(BlogDetails::class, ['post' => $post ])
            ->assertStatus(200);

        $this->assertEquals(1, $post->views()->count());
    }
}
