<?php

namespace Tests\Unit\Services;

use Mockery;
use PHPUnit\Framework\TestCase;
use App\services\RoomService;
use Tests\Unit\Services\RoomServiceTest as ServicesRoomServiceTest;

class RoomServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     * @runInSeparateProcess
     * @return void
     */
    public function test_check_own_room()
    {
      $roomService = new ServicesRoomServiceTest(); //インスタンス作成 

      $mock = Mockery::mock('alias:App\Models\Room');
      $mock->shouldReceive('where->first')->andReturn((object)[
        'id' => 1,
        'user_id' => 1
      ]);

      $result = $roomService->checkOwnRoom(1, 1);
      $this->assertTrue($result);

      $result = $roomService->checkOwnRoom(2, 1);
      $this->assertFalse($result);
    }
}
