<?php

namespace Tests\Feature\Livewire\Components;

use App\Livewire\Components\UpvoteDownvote;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;
use Tests\TestCase;

class UpvoteDownvoteTest extends TestCase
{
    use RefreshDatabase;

    public function test_up_vote_successfull(): void
    {
        $user = User::factory()->create();
        $post = Blog::create([
            'user_id' => $user->id,
            'title' => 'Created by tester',
            'image' => UploadedFile::fake()->create('test.jpg'),
            'description' => 'This is sample description by tester'
        ]);

        $this->assertEquals(0, $post->votes()->count());

        Livewire::actingAs($user)
            ->test(UpvoteDownvote::class, ['model' => $post])
            ->assertViewHas('isVoted', false)
            ->call('toggleVote')
            ->assertViewHas('isVoted', true);


        $this->assertEquals(1, $post->votes()->count());
    }

    public function test_down_vote_successfull(): void
    {
        $user = User::factory()->create();
        $post = Blog::create([
            'user_id' => $user->id,
            'title' => 'Created by tester',
            'image' => UploadedFile::fake()->create('test.jpg'),
            'description' => 'This is sample description by tester'
        ]);

        $post->votes()->create([
            'user_id' => $user->id
        ]);

        $this->assertEquals(1, $post->votes()->count());

        Livewire::actingAs($user)
            ->test(UpvoteDownvote::class, ['model' => $post])
            ->assertViewHas('isVoted', true)
            ->call('toggleVote')
            ->assertViewHas('isVotedUp', false);

        $this->assertEquals(0, $post->votes()->count());
    }
}
