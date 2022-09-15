<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class RoomControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_image() //画像が正しく表示されているか
    {
      $user = User::factory()->create();
      
      Storage::fake('room');
      $file = UploadedFile::fake()->image('hoge.jpg');  //fakeでダミー画像を作成
      $this->actingAs($user)  //ユーザーをログイン状態にする
        ->post('/rooms', [  //バリデーションに引っかかるため作成
        'image' => $file,
        'name' => "a",
        'price' => 200,
        'introduction' => 'a',
        'adress' =>'a',
        'post_user' => '1',
        ]);
      
      Storage::disk('public')->assertExists('/room/hoge.jpg');
    }
}
