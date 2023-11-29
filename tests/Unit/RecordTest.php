<?php

namespace Tests\Unit;

use App\Http\Controllers\RecordController;
use App\Http\Requests\RecordRequest;
use App\Models\Record;
use Mockery;
use Tests\TestCase;
class RecordTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/record');

        $response->assertStatus(200);
    }
    public function testCreate()
    {
        $requestData = [
            'name' => 'John001',
            'phone' => '89915409922',
            'specialist_id' => '5',
            'date' => '2023-11-24',
            'service_id' => '1',
            'time' => '19:32:11'
        ];

        $request = Mockery::mock(RecordRequest::class);
        $request->shouldReceive('all')->andReturn($requestData);
        $controller = new RecordController();
        $response = $controller->create($request);
        $this->assertDatabaseHas('records', $requestData);
        Record::where('name', 'John001')->delete();
    }



}
