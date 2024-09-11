<?php

namespace Tests\Feature\Livewire\Modals\Blog;

use App\Livewire\Modals\Blog\DeleteModal;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;
use function Livewire\Volt\exists;
use Tests\TestCase;

class DeleteModalTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_post(): void
    {
        $user = User::factory()->create();
        $post = Blog::create([
            'user_id' => $user->id,
            'title' => 'Created by tester',
            'image' => UploadedFile::fake()->create('test.jpg'),
            'description' => 'This is sample description by tester'
        ]);

        $this->assertTrue(Blog::where('title', 'Created by tester')->exists());

        Livewire::actingAs($user)
            ->test(DeleteModal::class, ['post' => $post])
            ->call('delete');

        $this->assertFalse(Blog::where('title', 'Created by tester')->exists());
    }
}
