<?php

namespace Tests\Feature;


use App\Models\User;
use Tests\TestCase;


class AccessRoomTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     *
     */
    public function test_not_login() //ログインしていなければリダイレクト
    {
        $response = $this->get('/rooms');
        $response->assertStatus(302);
    }
    
    public function test_login() //ログインしてれば/rooms表示する
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/rooms');
        $response->assertStatus(200);
    }
}
