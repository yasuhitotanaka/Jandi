<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;
use App\Comment;


class PostTest extends DuskTestCase
{

    // use RefreshDatabase;

    public function Setup() {
        parent::setUp();
        
        // test data for Post
        $this->home_url = 'http://localhost/Jandi/public/';
        $this->create_post_path = '/Jandi/public/create';  
        $this->create_post_url = 'http://localhost/Jandi/public/create';
        $this->home_path = '/Jandi/public/';

        $this->post = factory(\App\Post::class)->make(); 
        $post = Post::first();
        $post_id = $post->id;
        $this->edit_post_url = 'http://localhost/Jandi/public/post/'. $post_id .'/edit';

        \DB::beginTransaction();
    }

        /**
     * A basic test example.
     *
     * @return void
     */
    public function testCheckLinkToPostCreate()
    {
        $this->browse(function (Browser $browser) {
          $browser->visit($this->home_url)
                  ->clickLink('投稿する')
                  ->assertPathIs($this->create_post_path);
        });
    }


    public function testCreateNewPost()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit($this->create_post_url)
                ->type('title', $this->post->title)
                ->type('url', $this->post->url)
                ->type('description', $this->post->description)
                ->type('user', $this->post->user)
                ->press('作成する')
                ->assertPathIs($this->home_path);
        });

        $this->assertDatabaseHas('posts', [
            'title' => $this->post->title,
            'url' => $this->post->url,
            'description' => $this->post->description,
            'user' => $this->post->user,
        ]);
    }

    public function testEditPost()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit($this->edit_post_url)
                ->type('title', $this->post->title . '-Edit')
                ->type('url', $this->post->url . '.edit')
                ->type('description', $this->post->description)
                ->type('user', $this->post->user)
                ->press('更新する')
                ->assertPathIs($this->home_path);
        });

        $this->assertDatabaseHas('posts', [
            'title' => $this->post->title . '-Edit',
            'url' => $this->post->url . '.edit',
            'description' => $this->post->description,
            'user' => $this->post->user,
        ]);
    }
}


class CommentTest extends DuskTestCase
{
    
    public function testCreateNewComment()
    {        
        // test data for Comment
        $this->comment = factory(\App\Comment::class)->make();
        $this->create_comment_url = 
            'http://127.0.0.1/Jandi/public/post/' 
            . $this->comment->post_id
            . '/comment';
        $this->post_detail_path = '/Jandi/public/post/' 
                                    . $this->comment->post_id;

        $this->browse(function (Browser $browser) {
          $browser->visit($this->create_comment_url)
                ->type('comment', $this->comment->comment)
                ->type('user', $this->comment->user)
                ->press('投稿する')
                ->assertPathIs($this->post_detail_path);
        });

        $this->assertDatabaseHas('comments', [
            'post_id'=> $this->comment->post_id,
            'comment'=> $this->comment->comment,
            'user'=> $this->comment->user,
        ]);
    }

    public function testEditComment()
    {
        $this->comment = Comment::first();
        $this->edit_comment_url = 'http://localhost/Jandi/public/post/' 
                        . $this->comment->post_id . '/comment/' . $this->comment->id . '/edit';
        $this->post_detail_path = '/Jandi/public/post/' . $this->comment->post_id;

        $this->browse(function (Browser $browser) {
          $browser->visit($this->edit_comment_url)
                ->type('comment', $this->comment->comment . '--EDIT')
                ->type('user', $this->comment->user)
                ->press('更新する')
                ->assertPathIs($this->post_detail_path);
        });

        $this->assertDatabaseHas('comments', [
            'post_id'=> $this->comment->post_id,
            'comment'=> $this->comment->comment . '--EDIT',
            'user'=> $this->comment->user,
        ]);
    }
}