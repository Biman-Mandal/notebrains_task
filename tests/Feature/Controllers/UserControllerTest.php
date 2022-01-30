<?php

namespace Tests\Feature\Controllers;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Class UserControllerTest
 * @package Tests\Feature\Controllers
 * @property User $user
 */
class UserControllerTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function index_route(): void
    {
        $response = $this->get('/user');
        $response->assertOk();
    }

    /**
     * @test
     * @return void
     */
    public function index_return_login_page(): void
    {
        $response = $this->get('/user');
        $response->assertViewIs('user.login');
    }

    /**
     * @return void
     */
    public function index_return_data(): void
    {
        $response = $this->get('/user');
        $this->assertStringContainsString('title', $response->content());
    }

    /**
     * @test
     * @return void
     */
    public function create_route(): void
    {
        $response = $this->get('user/create')->assertOk();
    }

    /**
     * @test
     * @return void
     */
    public function create_returns_view()
    {
        $response = $this->get('user/create')->assertViewIs('user.create');
    }

    /**
     * @test
     * @return void
     */
    public function create_returns_data()
    {
        $response = $this->get('user/create');
        $this->assertStringContainsString('title', $response->content());
    }
}
