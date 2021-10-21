<?php

namespace Tests\Feature;

//==========ここから追加==========
use App\Article;
//==========ここまで追加==========
//==========ここから追加==========
use App\User;
//==========ここまで追加==========
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    // //==========ここから削除==========
    // /**
    //  * A basic feature test example.
    //  *
    //  * @return void
    //  */
    // public function testExample()
    // {
    //     $response = $this->get('/');
    //
    //     $response->assertStatus(200);
    // }
    //==========ここまで削除==========
    //==========ここから追加==========
    use RefreshDatabase;

    public function testIsLikedByNull()
    {
        $article = factory(Article::class)->create();

        $result = $article->isLikedBy(null);

        $this->assertFalse($result);
    }
    //==========ここまで追加==========

    //==========ここから追加==========
    public function testIsLikedByTheUser()
    {
        $article = factory(Article::class)->create();
        $user = factory(User::class)->create();
        $article->likes()->attach($user);

        $result = $article->isLikedBy($user);

        $this->assertTrue($result);
    }
    //==========ここまで追加==========

    //==========ここから追加==========
    public function testIsLikedByAnother()
    {
        $article = factory(Article::class)->create();
        $user = factory(User::class)->create();
        $another = factory(User::class)->create();
        $article->likes()->attach($another);

        $result = $article->isLikedBy($user);

        $this->assertFalse($result);
    }
    //==========ここまで追加========== 
}
