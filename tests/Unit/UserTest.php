<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
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
        $response = $this->get('/registration');

        $response->assertStatus(200);
    }
    public function testRegister()
    {
        $data = [
            'name' => 'John001',
            'email' => 'test@mail.ru',
            'phone' => '89915409922',
            'password' => '123456789',
            'password_confirmation' => '123456789'
        ];
        $response = $this->post('/registration', $data);

        $this->assertDatabaseHas('users', [
            'email' => 'test@mail.ru'
        ]);

        $response->assertStatus(302)->assertRedirect('/email/verify');

        User::where('email', 'test@mail.ru')->delete();
    }

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function testLogin()
    {
        $data = [
            'name' => 'John001',
            'email' => 'test@mail.ru',
            'password' => '123456789',
        ];
        $user = User::create($data);
        $response = $this->post('/login', $data);
        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);
        User::where('email', 'test@mail.ru')->delete();
    }
}
