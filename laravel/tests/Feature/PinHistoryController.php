<?php

namespace Tests\Feature;

use App\Models\Pin;
use App\Models\PinHistory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PinHistoryController extends TestCase {

    use WithFaker;
    use RefreshDatabase;

    protected $testPin;

    protected $testPinHistory;

    protected function setUp(): void {
        parent::setUp();
        $this->testPin = factory(Pin::class)->create([
            'id' => 1,
            'rfidNumber' => 'TEST001',
        ]);
        $this->testPinHistory = factory(PinHistory::class)->create([
            'id' => 1,
            'pin_id' => $this->testPin->id,
            'latitude' => 25.0,
            'longitude' => 25.0,
        ]);
    }

    protected function tearDown(): void {
        parent::tearDown();
    }

    public function testListAllPinHistories() {
        $response = $this->get('api/pinhistory');
        $response->assertStatus(200);
    }

    public function testGetPinHistoryList() {
        $response = $this->get('api/pin/1/history');
        $response
            ->assertStatus(200)
            ->assertJson([
                [
                    "pin_id" => 1,
                    "latitude" => 25,
                    "longitude" => 25,
                ],
            ]);
    }

    public function testGetPinHistoryDetails() {
        $response = $this->get('api/pinhistory/' . $this->testPinHistory->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                "pin_id" => 1,
                "latitude" => 25.0,
                "longitude" => 25.0,
            ]);
    }
    public function testGetPinHistoryDetailsWith404() {
        $response = $this->get('api/pinhistory/notfound');
        $response
            ->assertStatus(404)
            ->assertJson([
                "error" => "PinHistory not found",
            ]);
    }

}
