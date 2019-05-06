<?php

namespace Tests\Feature\Api\V1;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testGetIndexSuccess()
    {
        $response = $this->get('/api/v1/users', [], []);

        $response->assertJson([
            'success' => true,
        ])->assertStatus(200);
    }

    public function testCanCreateUser()
    {
        $data = [
            'email'     => str_random(10).'@gmail.com',
            'password'  => str_random(10),
            'name'      => str_random(10),
        ];

        $response = $this->post('/api/v1/users', $data, []);

        $response->assertJson([
            'success' => true,
        ])->assertStatus(200);
    }

    public function testCreateUserWithoutParams()
    {
        $data = [
            'email'     => 'lyhoi.2204@gmail.com',
        ];

        $response = $this->post('/api/v1/users', $data, []);

        $response->assertJsonStructure([
            'success',
            'message',
            'fields',
        ])->assertStatus(400);
    }

    public function testCanUpdateUser()
    {
        $user = factory(User::class)->create();
        $dataUpdate = [
            'email'     => str_random(11).'@gmail.com',
            'password'  => str_random(11),
            'name'      => str_random(11),
        ];

        $response = $this->put('/api/v1/users/' . $user->id, $dataUpdate, []);

        $response->assertJsonStructure([
            'data',
        ])->assertStatus(200);
    }

    public function testUpdateUserWithoutParam()
    {
        $user = factory(User::class)->create();

        $response = $this->put('/api/v1/users/' . $user->id, [], []);

        $response->assertJsonStructure([
            'success',
            'message',
            'fields',
        ])->assertStatus(400);
    }


    public function testCanDeleteUser()
    {
        $dataCreate = [
            'email'     => str_random(10).'@gmail.com',
            'password'  => str_random(10),
            'name'      => str_random(10),
        ];
        $user = User::create($dataCreate);

        $response = $this->delete('/api/v1/users/' . $user->id);

        $response->assertJsonStructure([
            'success',
        ])->assertStatus(200);
    }
}
