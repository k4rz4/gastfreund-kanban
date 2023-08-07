<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Board;

class BoardServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_board()
    {
        $data = ['name' => 'Test Board'];

        // The logic to call your service's create method.
        $board = Board::create($data);

        // Assert a board was added to the database.
        $this->assertCount(1, Board::all());

        // Assert the board in the database matches the given data.
        $this->assertEquals($data['name'], $board->name);
    }
}
