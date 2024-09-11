<?php

namespace Tests\Feature\Livewire\Pages\Blog;

use App\Livewire\Pages\Blog\BlogAddEdit;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class BlogAddEditTest extends TestCase
{
    use RefreshDatabase;

    public function test_renders_successfully(): void
    {
        Livewire::test(BlogAddEdit::class)
            ->assertStatus(200);
    }

    public function test_create_post_successfully(): void
    {
        $user = User::factory()->create();

        $this->assertEquals(0, Blog::count());
        Livewire::actingAs($user)
            ->test(BlogAddEdit::class)
            ->set('form.title', 'Sample Title')
            ->set('form.image', UploadedFile::fake()->create('test.jpg'))
            ->set('form.description', 'Sample Description')
            ->call('save');

        $this->assertEquals(1, Blog::count());
    }

    public function test_update_post_successfully(): void
    {
        $user = User::factory()->create();
        $post = Blog::factory()->make([
            'user_id' => $user->id,
            'title' => 'Created by tester',
            'description' => 'This is sample description'
        ]);

        Livewire::actingAs($user)
            ->test(BlogAddEdit::class, ['post' => $post])
            ->assertSet('form.title', 'Created by tester')
            ->assertSet('form.description', 'This is sample description');

    }
}
