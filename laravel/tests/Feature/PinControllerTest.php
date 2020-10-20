<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Pin;

class PinControllerTest extends TestCase {

    use WithFaker;
    use RefreshDatabase;

    protected $testPin;

    protected function setUp(): void {
        parent::setUp();
        $this->testPin = factory(Pin::class)->create([
            'id' => 1,
            'rfidNumber' => 'TEST001',
            'latitude' => 35,
            'longitude' => -80,
        ]);
    }

    protected function tearDown(): void {
        parent::tearDown();
    }

    public function testGetAllPins() {
        $response = $this->get('api/pin');
        $response
            ->assertStatus(200)
            ->assertJson([
                [
                    'rfidNumber' => 'TEST001',
                ],
            ]);
    }

    public function testGetPin() {
        $response = $this->get('api/pin/1');
        $response
            ->assertStatus(200)
            ->assertJson([
                'rfidNumber' => 'TEST001',
            ]);
    }

    public function testCreatePin() {
        $testData = [
            'rfidNumber' => 'TEST002',
            'latitude' => 22,
            'longitude' => 22,
        ];
        $response = $this->postJson('api/pin', $testData);
        $response
            ->assertStatus(201)
            ->assertJson($testData);
    }

    public function testUpdatePin() {
        $newData = [
            'latitude' => 60,
            'longitude' => 90
        ];
        $response = $this->putJson('api/pin/' . $this->testPin->id, $newData);
        $response
            ->assertStatus(200)
            ->assertJson($newData);
    }

    public function testDeletePin() {
        $response = $this->delete('api/pin/' . $this->testPin->id);
        $response->assertStatus(204);
    }

}
