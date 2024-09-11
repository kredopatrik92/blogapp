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

        $this->assertEquals(0, $post->votes()->sum('vote'));

        Livewire::actingAs($user)
            ->test(UpvoteDownvote::class, ['model' => $post])
            ->call('upVote')
            ->assertViewHas('isVotedUp', true)
            ->assertViewHas('isVotedDown', false)
            ->assertSeeHtml('<i class="up-vote material-symbols-outlined text-[36px] lg:text-[48px] leading-[0.5em] flex text-orange-600">');


        $this->assertEquals(1, $post->votes()->sum('vote'));
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

        $this->assertEquals(0, $post->votes()->sum('vote'));

        Livewire::actingAs($user)
            ->test(UpvoteDownvote::class, ['model' => $post])
            ->call('downVote')
            ->assertViewHas('isVotedDown', true)
            ->assertViewHas('isVotedUp', false)
            ->assertSeeHtml('<i class="down-vote material-symbols-outlined text-[36px] lg:text-[48px] leading-[0.5em] flex text-orange-600">');

        $this->assertEquals(-1, $post->votes()->sum('vote'));
    }
}
